/**
 * Smart Biller - PDF Export Module
 * Generates professional receipts using jsPDF.
 */

document.getElementById('exportPdfBtn').addEventListener('click', () => {
    if (!window.lastResult) {
        alert('No calculation data available to export.');
        return;
    }

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const data = window.lastResult;
    const timestamp = new Date(data.timestamp).toLocaleString();

    // Set Theme
    const primaryColor = [6, 182, 212]; // Cyan
    const secondaryColor = [16, 185, 129]; // Emerald

    // Header
    doc.setFillColor(15, 23, 42); // bg-dark
    doc.rect(0, 0, 210, 40, 'F');

    doc.setTextColor(255, 255, 255);
    doc.setFontSize(24);
    doc.setFont('helvetica', 'bold');
    doc.text('SMART BILLER', 20, 25);

    doc.setFontSize(10);
    doc.setFont('helvetica', 'normal');
    doc.text('Professional Electricity Calculation Receipt', 20, 32);

    doc.setTextColor(200, 200, 200);
    doc.text(`Generated on: ${timestamp}`, 130, 25);
    doc.text(`Mode: ${data.mode.toUpperCase()}`, 130, 32);

    // Summary Section
    doc.setTextColor(0, 0, 0);
    doc.setFontSize(14);
    doc.text('Bill Summary', 20, 55);

    doc.autoTable({
        startY: 60,
        head: [['Metric', 'Value']],
        body: [
            ['Total Consumption', `${data.totalUnits.toFixed(2)} Units`],
            ['Sub-Meter Consumption', `${data.subUnits.toFixed(2)} Units`],
            ['Effective Average Rate', `Tk ${data.avgRate.toFixed(4)} / Unit`],
            ['Total Bill Amount', `Tk ${data.totalBill.toFixed(2)}`]
        ],
        theme: 'striped',
        headStyles: { fillColor: primaryColor }
    });

    // Breakdown Section
    doc.text('Authoritative Breakdown', 20, doc.lastAutoTable.finalY + 15);

    const tableColumns = ['Description', 'Owner (Tk)', 'Total (Tk)'];
    const tableBody = [
        ['Energy Cost', data.owner.energy.toFixed(2), data.energyCost.toFixed(2)],
        ['Fixed Charges (Demand + VAT)', data.owner.fixed.toFixed(2), data.fixedCharges.toFixed(2)],
        ['GRAND TOTAL', data.owner.total.toFixed(2), data.totalBill.toFixed(2)]
    ];

    if (data.mode === 'dual') {
        tableColumns.splice(2, 0, 'Tenant (Tk)');
        tableBody[0].splice(2, 0, data.tenant.energy.toFixed(2));
        tableBody[1].splice(2, 0, data.tenant.fixed.toFixed(2));
        tableBody[2].splice(2, 0, data.tenant.total.toFixed(2));
    }

    doc.autoTable({
        startY: doc.lastAutoTable.finalY + 20,
        head: [tableColumns],
        body: tableBody,
        theme: 'grid',
        headStyles: { fillColor: secondaryColor },
        didParseCell: function (data) {
            if (data.row.index === 2) {
                data.cell.styles.fontStyle = 'bold';
            }
        }
    });

    // Footer
    const finalY = doc.lastAutoTable.finalY + 30;
    doc.setFontSize(10);
    doc.setTextColor(100, 100, 100);
    doc.text('Thank you for using Smart Biller.', 20, finalY);
    doc.text('This is an electronically generated report.', 20, finalY + 5);

    // Save PDF
    const filename = `SmartBiller_Bill_${new Date().getTime()}.pdf`;
    doc.save(filename);
});
