<?php
require('fpdf.php');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    http_response_code(400);
    echo "Invalid data";
    exit;
}

// A4 precise width/height in points to match ReportLab A4 size
$width = 595.27;
$height = 841.89;

$pdf = new FPDF('P', 'pt', array($width, $height));
$pdf->AddPage();
// Courier matches dot matrix style
$pdf->SetFont('Courier', '', 10);
$pdf->SetAutoPageBreak(false);

$inch = 72;
$content_width = 7 * $inch;
$margin_x = ($width - $content_width) / 2;
$y = $height - 1.0 * $inch;
$line_height = 14;

// Helper to mimic ReportLab's bottom-left origin coordinate system
function drawString($pdf, $x, $y_pos, $text) {
    global $height;
    // FPDF Text() origin is top-left, so we flip Y
    $pdf->Text($x, $height - $y_pos, $text);
}

function stringWidth($pdf, $text) {
    return $pdf->GetStringWidth($text);
}

function draw_centered_text($pdf, $text, $y_pos, $width) {
    $text_width = stringWidth($pdf, $text);
    drawString($pdf, ($width - $text_width) / 2, $y_pos, $text);
}

// Ensure default values if absent
$monthYear = isset($data['monthYear']) ? $data['monthYear'] : '';
$empName   = isset($data['empName']) ? $data['empName'] : '';
$gslisNo   = isset($data['gslisNo']) ? $data['gslisNo'] : '';
$empDesig  = isset($data['empDesig']) ? $data['empDesig'] : '';
$entitlements = isset($data['entitlements']) ? $data['entitlements'] : [];
$deductions = isset($data['deductions']) ? $data['deductions'] : [];
$remarks_text = isset($data['remarks']) ? $data['remarks'] : '';

// Details Header
draw_centered_text($pdf, "ICMR-NATIONAL INSTITUTE FOR TRIBAL HEALTH RESEARCH, JABALPUR", $y, $width);
$y -= $line_height;
draw_centered_text($pdf, "PAY SLIP FOR THE MONTH OF   " . $monthYear, $y, $width);
$y -= $line_height;

$stars = str_repeat("* ", 42) . "*";
draw_centered_text($pdf, $stars, $y, $width);
$y -= $line_height;

$name_str = "NAME   : " . $empName;
$gslis_str = "GSLIS NO.: " . $gslisNo;
drawString($pdf, $margin_x, $y, $name_str);
drawString($pdf, $margin_x + 5.0 * $inch, $y, $gslis_str);
$y -= $line_height;

drawString($pdf, $margin_x, $y, "DESIG. : " . $empDesig);
$y -= $line_height;

drawString($pdf, $margin_x, $y, str_repeat("-", 85));
$y -= $line_height;

// Column Headers
$deduction_x = $margin_x + 4.0 * $inch;
drawString($pdf, $margin_x, $y, "Entitlement :");
drawString($pdf, $deduction_x, $y, "Deductions :");
$y -= $line_height;
drawString($pdf, $margin_x, $y, str_repeat("-", 23));
drawString($pdf, $deduction_x, $y, str_repeat("-", 23));
$y -= $line_height;

// Add Extra field - remarks to entitlements
$entitlements[] = ["name" => "Remarks/LWP if any", "amount" => $remarks_text, "is_text" => true];

$max_rows = max(count($entitlements), count($deductions));
$start_y = $y;

$gross = 0.0;
$tot_ded = 0.0;

for ($i = 0; $i < $max_rows; $i++) {
    $y_pos = $start_y - ($i * $line_height);
    
    // Process Entitlements
    if ($i < count($entitlements)) {
        $e = $entitlements[$i];
        if (!empty($e["is_text"])) {
            $formatted = sprintf("%-23s: %s", $e['name'], $e['amount']);
            drawString($pdf, $margin_x, $y_pos, $formatted);
        } else {
            $amt = (float)(isset($e['amount']) ? $e['amount'] : 0);
            $formatted = sprintf("%-23s: %10.2f", $e['name'], $amt);
            drawString($pdf, $margin_x, $y_pos, $formatted);
            $gross += $amt;
        }
    }
            
    // Process Deductions
    if ($i < count($deductions)) {
        $d = $deductions[$i];
        $amt = (float)(isset($d['amount']) ? $d['amount'] : 0);
        $formatted = sprintf("%-22s: %10.2f", $d['name'], $amt);
        drawString($pdf, $deduction_x, $y_pos, $formatted);
        $tot_ded += $amt;
    }
}

$y = $start_y - ($max_rows * $line_height) - $line_height;

$dash_offset_entitlement = $margin_x + stringWidth($pdf, str_repeat("A", 25));
$dash_offset_deduction = $deduction_x + stringWidth($pdf, str_repeat("A", 25));

drawString($pdf, $dash_offset_entitlement, $y, "----------");
drawString($pdf, $dash_offset_deduction, $y, "----------");
$y -= $line_height;

drawString($pdf, $margin_x, $y, sprintf("GROSS TOTAL -->          %10.2f", $gross));
drawString($pdf, $deduction_x, $y, sprintf("TOTAL DEDUCTIONS -->     %10.2f", $tot_ded));
$y -= $line_height;

drawString($pdf, $dash_offset_entitlement, $y, "==========");
drawString($pdf, $dash_offset_deduction, $y, "==========");
$y -= $line_height;

$net_paid = $gross - $tot_ded;
drawString($pdf, $deduction_x, $y, sprintf("NET AMOUNT PAID -->      %10.2f", $net_paid));
$y -= $line_height * 3;

// Signatures
drawString($pdf, $margin_x, $y, "Employee's Sign.");
drawString($pdf, $deduction_x, $y, "Drawing & disbursing Officer");

// Output PDF to browser
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Payslip_' . ($monthYear ? $monthYear : "Generated") . '.pdf"');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

$pdf->Output('D', "Payslip_" . ($monthYear ? $monthYear : "Generated") . ".pdf");
?>
