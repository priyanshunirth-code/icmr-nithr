<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip Generator Dashboard</title>
    <!-- Modern Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4F46E5;        /* Indigo */
            --primary-light: #EEF2FF;
            --secondary: #10B981;      /* Emerald */
            --danger: #EF4444;         /* Red for deductions */
            --danger-light: #FEF2F2;
            --background: #F3F4F6;
            --card-bg: #FFFFFF;
            --text-main: #111827;
            --text-muted: #6B7280;
            --border: #E5E7EB;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --focus-ring: 0 0 0 3px rgba(79, 70, 229, 0.2);
            --focus-ring-danger: 0 0 0 3px rgba(239, 68, 68, 0.2);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #F9FAFB 0%, #E5E7EB 100%);
            color: var(--text-main);
            min-height: 100vh;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .dashboard-container {
            background-color: var(--card-bg);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            max-width: 1050px;
            width: 100%;
            padding: 1.5rem 2.5rem;
            position: relative;
            animation: fadeIn 0.4s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header-title {
            text-align: center;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.15rem;
            letter-spacing: 0.025em;
            text-transform: uppercase;
        }
        
        .header-subtitle {
            text-align: center;
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-muted);
            margin-bottom: 1rem;
        }

        .header-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1rem;
            background: var(--primary-light);
            padding: 1rem;
            border-radius: 12px;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-group input {
            padding: 0.5rem 0.75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-main);
            background-color: #ffffff;
            transition: all 0.2s ease;
            box-shadow: var(--shadow-sm);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: var(--focus-ring);
        }

        .split-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            padding-bottom: 0.5rem;
            margin-bottom: 0.5rem;
            border-bottom: 2px solid var(--border);
            display: flex;
            align-items: center;
        }

        .entitlements-col .section-title {
            border-bottom-color: var(--primary);
            color: var(--primary);
        }

        .deductions-col .section-title {
            border-bottom-color: var(--danger);
            color: var(--danger);
        }

        .input-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.15rem;
            padding: 0.25rem 0.5rem;
            border-radius: 8px;
            transition: background-color 0.15s ease;
            border: 1px solid transparent;
        }
        
        .entitlements-col .input-row:hover {
            background-color: var(--primary-light);
            border-color: rgba(79, 70, 229, 0.1);
        }
        
        .deductions-col .input-row:hover {
            background-color: var(--danger-light);
            border-color: rgba(239, 68, 68, 0.1);
        }

        .input-row label {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-main);
            flex: 1;
        }

        .input-wrapper {
            position: relative;
            width: 160px;
        }

        .input-wrapper::before {
            content: '₹';
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-weight: 500;
            z-index: 1;
        }

        .input-row input[type="number"] {
            width: 100%;
            padding: 0.35rem 0.5rem 0.35rem 1.7rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 0.95rem;
            text-align: right;
            font-family: 'Courier New', Courier, monospace;
            font-weight: 600;
            color: var(--text-main);
            transition: all 0.2s ease;
            box-shadow: var(--shadow-sm);
        }
        
        /* Hide number input spinners */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
        
        .input-row input.text-input {
            width: 100%;
            padding: 0.4rem 0.5rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 0.9rem;
            font-family: inherit;
            color: var(--text-main);
            box-shadow: var(--shadow-sm);
            transition: all 0.2s ease;
        }
        
        .input-row input.text-input-wrapper::before {
            display: none;
        }

        .entitlements-col .input-row input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: var(--focus-ring);
        }
        
        .deductions-col .input-row input:focus {
            outline: none;
            border-color: var(--danger);
            box-shadow: var(--focus-ring-danger);
        }

        .totals-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px dashed var(--border);
        }

        .total-box {
            background: #F9FAFB;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .total-box:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .total-box.gross {
            border-left: 5px solid var(--primary);
            background: linear-gradient(to right, rgba(79, 70, 229, 0.05), #F9FAFB);
        }

        .total-box.deductions {
            border-left: 5px solid var(--danger);
            background: linear-gradient(to right, rgba(239, 68, 68, 0.05), #F9FAFB);
        }

        .total-label {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .total-value {
            font-size: 1.15rem;
            font-weight: 700;
            font-family: 'Courier New', Courier, monospace;
            color: var(--text-main);
        }

        .net-pay-section {
            margin-top: 1rem;
            background: linear-gradient(135deg, var(--primary) 0%, #3730A3 100%);
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-md);
            transform: translateY(0);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .net-pay-section:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .net-pay-meta {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .net-pay-label {
            font-size: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            opacity: 0.9;
        }
        
        .net-pay-subtitle {
            font-size: 0.8rem;
            opacity: 0.75;
        }

        .net-pay-value {
            font-size: 2rem;
            font-weight: 800;
            font-family: 'Courier New', Courier, monospace;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        /* Icons */
        .icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        .action-buttons {
            margin-top: 1rem;
            display: flex;
            justify-content: flex-end;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
        }

        .btn {
            padding: 0.85rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background-color: #4338CA;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            body { padding: 0.5rem; }
            .dashboard-container { padding: 1.5rem 1rem; border-radius: 12px; }
            .header-title { font-size: 1.1rem; }
            .header-info-grid { grid-template-columns: 1fr; padding: 0.75rem; }
            .split-layout { grid-template-columns: 1fr; gap: 1.5rem; }
            .totals-section { grid-template-columns: 1fr; gap: 1rem; }
            .net-pay-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 1rem;
                padding: 1.25rem 1rem;
            }
            .net-pay-meta { align-items: center; }
            .action-buttons { justify-content: stretch; }
            .btn-primary { width: 100%; justify-content: center; }
            
            .input-wrapper { width: 130px; }
            .input-row label { font-size: 0.85rem; }
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <h1 class="header-title">ICMR-NATIONAL INSTITUTE FOR TRIBAL HEALTH RESEARCH, JABALPUR</h1>
        <h2 class="header-subtitle">Interactive Salary Dashboard</h2>

        <div class="header-info-grid">
            <div class="form-group">
                <label for="monthYear">MONTH & YEAR</label>
                <input type="text" id="monthYear" placeholder="e.g., MAR-2026" value="">
            </div>
            <div class="form-group">
                <label for="gslisNo">GSLIS NO.</label>
                <input type="text" id="gslisNo" placeholder="Enter GSLIS Number" value="">
            </div>
            <div class="form-group">
                <label for="empName">EMPLOYEE NAME</label>
                <input type="text" id="empName" placeholder="Name" value="">
            </div>
            <div class="form-group">
                <label for="empDesig">DESIGNATION</label>
                <input type="text" id="empDesig" placeholder="Designation" value="">
            </div>
        </div>

        <div class="split-layout">
            <!-- Entitlements Column -->
            <div class="entitlements-col">
                <div class="section-title">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    Entitlements
                </div>
                
                <div id="entitlements-inputs">
                    <!-- Javascript will render rows here -->
                </div>
                
                <div class="input-row" style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                    <label style="color: var(--text-muted); font-size: 0.9rem;">Remarks / LWP if any:</label>
                    <div style="width: 240px;">
                        <input type="text" id="remarks" class="text-input" placeholder="Enter remarks">
                    </div>
                </div>
            </div>

            <!-- Deductions Column -->
            <div class="deductions-col">
                <div class="section-title">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 5L5 19M5 5l14 14"/></svg>
                    Deductions
                </div>
                
                <div id="deductions-inputs">
                    <!-- Javascript will render rows here -->
                </div>
            </div>
        </div>

        <!-- Calculated Totals -->
        <div class="totals-section">
            <div class="total-box gross">
                <span class="total-label">GROSS TOTAL</span>
                <span class="total-value" id="grossTotal">₹ 0.00</span>
            </div>
            <div class="total-box deductions">
                <span class="total-label">TOTAL DEDUCTIONS</span>
                <span class="total-value" id="totalDeductions">₹ 0.00</span>
            </div>
        </div>

        <!-- Final Net Pay -->
        <div class="net-pay-section">
            <div class="net-pay-meta">
                <div class="net-pay-label">Net Amount Paid</div>
                <div class="net-pay-subtitle" id="netSubText">Transferable to Bank Account</div>
            </div>
            <div class="net-pay-value" id="netAmount">₹ 0.00</div>
        </div>
        
        <div class="action-buttons">
            <button class="btn btn-primary" onclick="generatePDF()" id="printBtn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Generate Print PDF
            </button>
        </div>
    </div>

    <script>
        // Data Structure Matching Original Slip
        const entitlementsData = [
            { id: 'basic_pay', label: 'BASIC PAY' },
            { id: 'grade_pay', label: 'GRADE PAY' },
            { id: 'family_plan', label: 'FAMILY PLAN.ALLOW.' },
            { id: 'spl_pay', label: 'SPL PAY' },
            { id: 'wa_other', label: 'WA/OTHER ALLOWANCE' },
            { id: 'non_practice', label: 'NON PRACTICE ALLOW.' },
            { id: 'da', label: 'DEARNESS ALLOW.(DA)' },
            { id: 'hra', label: 'H.RENT ALLOW. (HRA)' },
            { id: 'transport', label: 'TRANSPORT ALLOW.' },
            { id: 'da_tpa', label: 'D.A. ON TPA' }
        ];

        const deductionsData = [
            { id: 'income_tax', label: 'INCOME TAX' },
            { id: 'prof_tax', label: 'PROFESSIONAL TAX' },
            { id: 'tier_1', label: 'TIER-I+REC-TIER-I' },
            { id: 'interest', label: 'INTEREST/OTHER RECOV' },
            { id: 'licence_fee', label: 'LICENCE FEE' },
            { id: 'water', label: 'WATER CHARGES' },
            { id: 'gpf_adv', label: 'GPF ADVANCE RECOV.' },
            { id: 'cycle_adv', label: 'CYCLE ADV. RECOV.' },
            { id: 'festival_adv', label: 'FESTIVAL ADV. RECOV.' },
            { id: 'house_adv', label: 'HOUSE BULID ADV.REC.' },
            { id: 'gslis_ded', label: 'GSLIS' },
            { id: 'scooter_adv', label: 'SCOOTER ADV.RECOV.' },
            { id: 'computer_adv', label: 'COMPUTER ADV.RECOV.' },
            { id: 'car_adv', label: 'CAR ADVANCE RECOV.' }
        ];

        // Format currency with Indian comma separation
        function formatCurrency(amount) {
            return parseFloat(amount).toLocaleString('en-IN', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        // Generate DOM rows dynamically
        function createInputRow(item, type) {
            return `
                <div class="input-row">
                    <label for="${item.id}">${item.label}</label>
                    <div class="input-wrapper">
                        <!-- onfocus clears 0.00 for easy typing, onblur restores it if empty -->
                        <input 
                            type="number" 
                            step="0.01" 
                            id="${item.id}" 
                            class="amount-input ${type}" 
                            value="0.00" 
                            onfocus="if(parseFloat(this.value) === 0) this.value=''" 
                            onblur="if(this.value==='') this.value='0.00'; calculateTotals()"
                        >
                    </div>
                </div>
            `;
        }

        // Initialize Form
        function renderInputs() {
            const entContainer = document.getElementById('entitlements-inputs');
            const dedContainer = document.getElementById('deductions-inputs');

            entContainer.innerHTML = entitlementsData.map(item => createInputRow(item, 'entitlement-val')).join('');
            dedContainer.innerHTML = deductionsData.map(item => createInputRow(item, 'deduction-val')).join('');
            
            // Add real-time event listeners
            document.querySelectorAll('.amount-input').forEach(input => {
                input.addEventListener('input', calculateTotals);
            });
        }

        // Calculate Totals Logic
        function calculateTotals() {
            let gross = 0;
            let deductions = 0;

            document.querySelectorAll('.entitlement-val').forEach(input => {
                const val = parseFloat(input.value);
                if (!isNaN(val)) gross += val;
            });

            document.querySelectorAll('.deduction-val').forEach(input => {
                const val = parseFloat(input.value);
                if (!isNaN(val)) deductions += val;
            });

            const net = gross - deductions;

            // Update UI
            document.getElementById('grossTotal').textContent = '₹ ' + formatCurrency(gross);
            document.getElementById('totalDeductions').textContent = '₹ ' + formatCurrency(deductions);
            document.getElementById('netAmount').textContent = '₹ ' + formatCurrency(net);
        }

        // Run on load
        renderInputs();
        calculateTotals();

        async function generatePDF() {
            const btn = document.getElementById('printBtn');
            const originalText = btn.innerHTML;
            btn.innerHTML = 'Generating...';
            btn.disabled = true;

            const payload = {
                monthYear: document.getElementById('monthYear').value,
                gslisNo: document.getElementById('gslisNo').value,
                empName: document.getElementById('empName').value,
                empDesig: document.getElementById('empDesig').value,
                remarks: document.getElementById('remarks').value,
                entitlements: entitlementsData.map(e => ({ name: e.label, amount: parseFloat(document.getElementById(e.id).value) || 0 })),
                deductions: deductionsData.map(d => ({ name: d.label, amount: parseFloat(document.getElementById(d.id).value) || 0 }))
            };

            try {
                const response = await fetch('generate.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });
                
                if (response.ok) {
                    const blob = await response.blob();
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = `Payslip_${payload.monthYear}.pdf`;
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                } else {
                    alert('Error generating PDF');
                }
            } catch (err) {
                console.error(err);
                alert('Could not connect to the PDF generator backend. Make sure the local server is running.');
            } finally {
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        }
    </script>
</body>
</html>
