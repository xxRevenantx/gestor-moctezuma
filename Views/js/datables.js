
$("#table").DataTable({
    "language": {
           "lengthMenu": "Display _MENU_ records per page",
           "zeroRecords": "No se encuentran alumnos",
           "info": "Página _PAGE_ de _PAGES_",
           "infoEmpty": "No hay alumnos",
           "sSearch":         "Buscar:",
           "infoFiltered": "(filtrado de un total de _MAX_ alumnos )",
        "oPaginate": {
               "sFirst":    "Primero",
               "sLast":     "Último",
               "sNext":     "Siguiente",
               "sPrevious": "Anterior"
           },
       },
   dom: "Bfrtip",
   buttons: [
       {
           extend: "excel",                // Extend the excel button
           text: "Descargar tabla en Excel",
           className: 'btn btn-success',
           pageStyle: {
               sheetPr: {
                   pageSetUpPr: {
                       fitToPage: 1            // Fit the printing to the page
                   }
               },
               printOptions: {
                   horizontalCentered: true,
                   verticalCentered: true,
               },
               pageSetup: {
                   orientation: "landscape",   // Orientation
                   paperSize: "9",             // Paper size (1 = Letter, 9 = A4)
                   fitToWidth: "1",            // Fit to page width
                   fitToHeight: "0",           // Fit to page height
               },
               pageMargins: {
                   left: "0.2",
                   right: "0.2",
                   top: "0.4",
                   bottom: "0.4",
                   header: "0",
                   footer: "0",
               },
               repeatHeading: true,    // Repeat the heading row at the top of each page
               repeatCol: 'A:A',       // Repeat column A (for pages wider than a single printed page)
           },

       },
   ],
});
