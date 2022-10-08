import { swalMixin, urlPrincipal } from "../modulos/modules.js";


document.addEventListener('DOMContentLoaded', async () => {
  var colors = {
    primary        : "#6571ff",
    secondary      : "#7987a1",
    success        : "#05a34a",
    info           : "#66d1d1",
    warning        : "#fbbc06",
    danger         : "#ff3366",
    light          : "#e9ecef",
    dark           : "#060c17",
    muted          : "#7987a1",
    gridBorder     : "rgba(77, 138, 240, .15)",
    bodyColor      : "#000",
    cardBg         : "#fff"
  }

  
  var fontFamily = "'Roboto', Helvetica, sans-serif"


        let niveles = [];
        let preescolar = 0;
        let primaria = 0;
        let secundaria = 0;
        let bachillerato = 0;
        let sumaNiveles = 0;

let res = await fetch(urlPrincipal()+"Views/Ajax/chart.ajax.php"),
    json = await res.json();
        json.forEach(element => {
          if(element["id_nivel"] == 1 && element["Status"] == "ACTIVO"){
              preescolar++   
          }
          if(element["id_nivel"] == 2 && element["Status"] == "ACTIVO"){
            primaria++   
        }
        if(element["id_nivel"] == 3  && element["Status"] == "ACTIVO" ){
            secundaria++   
        }
        if(element["id_nivel"] == 4  && element["Status"] == "ACTIVO" ){
            bachillerato++   
        }
      });

             niveles.push(preescolar);
              niveles.push(primaria);
              niveles.push(secundaria);
              niveles.push(bachillerato);

              function sum(a, b, c,d,e) {
                return a+b+c+d+e;
              }
              sumaNiveles = sum(...niveles)
       // Polar Area Chart

       if($('#chartjsBar').length) {
      new Chart($('#chartjsBar'), {
      type: 'bar',
      data: {
        labels: ['PREESCOLAR', 'PRIMARIA', 'SECUNDARIA', 'BACHILLERATO'],
        datasets: [
          {
            label: "Alumnos",
            backgroundColor: [colors.primary, colors.danger, colors.success, colors.info, colors.secondary, colors.warning],
            borderColor: colors.cardBg,
            data: niveles,
          }
        ]
      },
      options: {
        plugins: {
          legend: { display: false },
        },
        scales: {
          x: {
            display: true,
            grid: {
              display: true,
              color: colors.gridBorder,
              borderColor: colors.gridBorder,
            },
            ticks: {
              color: colors.bodyColor,
              font: {
                size: 12
              }
            }
          },
          y: {
            grid: {
              display: true,
              color: colors.gridBorder,
              borderColor: colors.gridBorder,
            },
            ticks: {
              color: colors.bodyColor,
              font: {
                size: 12
              }
            }
          }
        }
      }
    });
  }
  
    })

