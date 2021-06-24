$(document).ready(function(){
  $.ajax({
    url: "http://192.168.65.5/UALTransfiere2/verificadosp.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var verificados = [];
      var noverificados = [];

      verificados.push(data[0].verificados);
      noverificados.push(data[0].noverificados);

      var chartdata = {
        labels: [
          'Verificado',
          'No verificado'
        ],
        datasets : [
          {
            label: "Usuarios verificados",
            data: [verificados, noverificados],
            backgroundColor: [
              '#007bff',
              '#e5e5e5'
            ],
            hoverBackgroundColor: [
              '#007bff',
              '#e5e5e5'
            ],
            borderWidth: [
              0, 0
            ],
            hoverBorderColor: [
              'transparent',
              'transparent'
            ]
          }
        ]
		
      };

      var ctx = $("#uverificadoscanvas");

      var barGraph = new Chart(ctx, {
        type: 'doughnut',
        data: chartdata,
		
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
