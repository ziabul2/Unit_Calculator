/**
 * Smart Biller - Main Calculator Logic
 * Handles UI, Validation, and State Management.
 */

document.addEventListener('DOMContentLoaded', () => {
    const billingForm = document.getElementById('billingForm');
    const modeRadios = document.querySelectorAll('input[name="mode"]');
    const subMeterSection = document.getElementById('subMeterSection');
    const resultsArea = document.getElementById('resultsArea');
    const resultsPlaceholder = document.getElementById('resultsPlaceholder');
    const actionButtons = document.getElementById('actionButtons');

    // Toggle Sub-Meter Section
    modeRadios.forEach(radio => {
        radio.addEventListener('change', (e) => {
            if (e.target.value === 'dual') {
                subMeterSection.classList.add('show');
                document.querySelectorAll('.tenant-col').forEach(el => el.classList.remove('d-none'));
            } else {
                subMeterSection.classList.remove('show');
                document.querySelectorAll('.tenant-col').forEach(el => el.classList.add('d-none'));
            }
        });
    });

    // Form Submission
    billingForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = {
            mode: document.querySelector('input[name="mode"]:checked').value,
            mainPrev: parseFloat(document.getElementById('mainPrev').value),
            mainCurr: parseFloat(document.getElementById('mainCurr').value),
            subPrev: parseFloat(document.getElementById('subPrev').value || 0),
            subCurr: parseFloat(document.getElementById('subCurr').value || 0),
            demandCharge: parseFloat(document.getElementById('demandCharge').value || 0),
            vatPercent: parseFloat(document.getElementById('vatPercent').value || 0)
        };

        // Basic Validation
        if (formData.mainCurr < formData.mainPrev) {
            alert('Current reading must be greater than previous reading!');
            return;
        }

        if (formData.mode === 'dual') {
            if (formData.subCurr < formData.subPrev) {
                alert('Sub-meter current reading must be greater than previous!');
                return;
            }
            if ((formData.subCurr - formData.subPrev) > (formData.mainCurr - formData.mainPrev)) {
                alert('Sub-meter consumption cannot be greater than total consumption!');
                return;
            }
        }

        try {
            const response = await fetch('smart-biller/api/calculate.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (result.status === 'success') {
                displayResults(result.data, formData.mode);
            } else {
                alert('Calculation failed: ' + result.message);
            }
        } catch (error) {
            console.error('Calculation Error:', error);
            // Check if it's a JSON parse error
            if (error instanceof SyntaxError) {
                alert('Server returned an invalid response. Please check PHP logs.');
            } else {
                alert('An error occurred during calculation: ' + error.message);
            }
        }
    });

    function displayResults(data, mode) {
        resultsPlaceholder.classList.add('d-none');
        resultsArea.classList.remove('d-none');
        actionButtons.classList.remove('d-none');

        // Handle Dual Units Display
        const dualUnitsRow = document.getElementById('dualUnitsRow');
        if (mode === 'dual') {
            dualUnitsRow.classList.remove('d-none');
            document.getElementById('resMainUnits').innerHTML = `${data.owner.units.toFixed(2)} <span class="small fw-normal">Units</span>`;
            document.getElementById('resSubUnits').innerHTML = `${data.subUnits.toFixed(2)} <span class="small fw-normal">Units</span>`;
        } else {
            dualUnitsRow.classList.add('d-none');
        }

        document.getElementById('resTotalUnits').innerHTML = `${data.totalUnits.toFixed(2)} <span class="fs-6 fw-normal text-secondary">Units</span>`;
        document.getElementById('resTotalBill').textContent = `৳${data.totalBill.toLocaleString(undefined, { minimumFractionDigits: 2 })}`;
        document.getElementById('resAvgRate').textContent = `৳${data.avgRate.toFixed(2)} / Unit`;

        const billEntries = document.getElementById('billEntries');
        billEntries.innerHTML = '';

        const rows = [
            { label: 'Units Consumed', owner: data.owner.units, tenant: data.tenant.units, total: data.totalUnits, isUnits: true },
            { label: 'Energy Cost', owner: data.owner.energy, tenant: data.tenant.energy, total: data.energyCost },
            { label: 'Demand Charge', owner: data.owner.demand, tenant: data.tenant.demand, total: data.demandChargeTotal },
            { label: 'VAT Amount', owner: data.owner.vat, tenant: data.tenant.vat, total: data.vatAmountTotal },
            { label: 'Grand Total', owner: data.owner.total, tenant: data.tenant.total, total: data.totalBill, highlight: true }
        ];

        rows.forEach(row => {
            const tr = document.createElement('tr');
            if (row.highlight) tr.classList.add('fw-bold', 'text-emerald');

            tr.innerHTML = `
                <td>${row.label}</td>
                <td class="text-end">${row.isUnits ? row.owner.toFixed(2) : '৳' + row.owner.toFixed(2)}</td>
                ${mode === 'dual' ? `<td class="text-end">${row.isUnits ? row.tenant.toFixed(2) : '৳' + row.tenant.toFixed(2)}</td>` : ''}
                <td class="text-end text-white fw-bold">${row.isUnits ? row.total.toFixed(2) : '৳' + row.total.toFixed(2)}</td>
            `;
            billEntries.appendChild(tr);
        });

        // Store last result for PDF/History
        window.lastResult = { ...data, mode, timestamp: new Date().toISOString() };
    }

    // Save Bill to LocalStorage
    document.getElementById('saveBillBtn').addEventListener('click', () => {
        if (!window.lastResult) return;

        let history = JSON.parse(localStorage.getItem('billingHistory') || '[]');
        history.unshift(window.lastResult);
        localStorage.setItem('billingHistory', JSON.stringify(history));

        alert('Bill saved successfully to history!');
    });

    // History View
    const historyModal = new bootstrap.Modal(document.getElementById('historyModal'));
    document.getElementById('viewHistoryBtn').addEventListener('click', () => {
        const history = JSON.parse(localStorage.getItem('billingHistory') || '[]');
        const tableBody = document.getElementById('historyTableBody');
        tableBody.innerHTML = '';

        if (history.length === 0) {
            tableBody.innerHTML = '<tr><td colspan="6" class="text-center py-4 text-secondary">No history found</td></tr>';
        } else {
            history.forEach((item, index) => {
                const date = new Date(item.timestamp).toLocaleDateString();
                const tr = document.createElement('tr');

                let details = '-';
                if (item.mode === 'dual') {
                    details = `<span class="text-secondary small">O: ৳${item.owner.total.toFixed(0)} | T: ৳${item.tenant.total.toFixed(0)}</span>`;
                }

                tr.innerHTML = `
                    <td>${date}</td>
                    <td><span class="badge ${item.mode === 'dual' ? 'bg-emerald' : 'bg-cyan'} bg-opacity-10 text-${item.mode === 'dual' ? 'emerald' : 'cyan'} border border-${item.mode === 'dual' ? 'emerald' : 'cyan'} border-opacity-25">${item.mode.toUpperCase()}</span></td>
                    <td>${item.totalUnits.toFixed(2)}</td>
                    <td class="text-emerald fw-bold">৳${item.totalBill.toFixed(2)}</td>
                    <td>${details}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger py-0 border-0" onclick="deleteHistoryItem(${index})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                `;
                tableBody.appendChild(tr);
            });
        }
        historyModal.show();
    });

    window.deleteHistoryItem = (index) => {
        if (!confirm('Delete this entry?')) return;
        let history = JSON.parse(localStorage.getItem('billingHistory') || '[]');
        history.splice(index, 1);
        localStorage.setItem('billingHistory', JSON.stringify(history));
        document.getElementById('viewHistoryBtn').click(); // Refresh
    };
});
