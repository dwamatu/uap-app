//Farmers Table

$('#farmersTable').DataTable({

    dom: 'Bfrtip',
    buttons: [{
        extend: 'excelHtml5',
        exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
        }
    },
        {
            extend: 'csvHtml5',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
        },
        {
            extend: 'pdfHtml5',
            "title": "All Farmers",
            message: 'A list of the Farmers.',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
        }]

});
//Loss Calculation Table

$('#lossCalculationTable').DataTable({

    dom: 'Bfrtip',
    buttons: [{
        extend: 'excelHtml5',
        exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
        }
    },
        {
            extend: 'csvHtml5',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
        },
        {
            extend: 'pdfHtml5',
            "title": "Loss Assessment",
            message: 'A list of the Loss Assessments.',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
        }]

});

//Loss Calculation Table

$('#typeLossTable').DataTable({

    dom: 'Bfrtip',
    buttons: [{
        extend: 'excelHtml5',
        exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
        }
    },
        {
            extend: 'csvHtml5',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
        },
        {
            extend: 'pdfHtml5',
            "title": "Types off Losses" ,
            message: 'A list of types of Losses.',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
        }]

});