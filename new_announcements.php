<?php
$announcements = [
    "Tender inviting EOI from National Accreditation Board for Testing and Calibration Laboratories (N.A.B.L.) accredited National Laboratories for Outsourcing of Laboratory Investigations in 34 different districts of India",
    "Result: Selected candidates for the ACSIR PhD Programme - January 2025 Session",
    "List of shortlisted candidates for the PhD Programme - January 2025 Session",
    "Result: Selected candidates for the ACSIR PhD Programme - August 2024 Session",
    "Vacancy Notifications under various projects",
    "List of shortlisted candidates for the PhD Programme - August 2024 Session",
];

echo "<ul>";  // Start the unordered list
foreach ($announcements as $announcement) {
    echo "<li>";
    echo $announcement;  // Display the announcement

    echo "</li>";
}
echo "</ul>";  // End the unordered list
?>


