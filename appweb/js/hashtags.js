$(document).ready(function(){
  $.ajax({
    url: "http://192.168.65.5/UALTransfiere2/tophashtag.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var hashtag = [];
      var cantidad = [];
      var cantidadtres = [];
      var cantidadsemana = [];

      for(var i in data) {
        hashtag.push(data[i].hashtag);
        cantidad.push(data[i].count);
        cantidadtres.push(data[i].countres);
        cantidadsemana.push(data[i].countsemana);
      }


      var chartdata = {
        labels: hashtag,
        datasets : [
          {
            label: 'Hoy',
            backgroundColor: 'rgba(41, 72, 255, 0.8)',
            hoverBackgroundColor: 'rgba(41, 72, 255, 1)',
			      fontFamily: "Poppins",
            data: cantidad
          },
		  {
            label: 'Hace 3 dias',
            backgroundColor: 'rgba(25,114,255,0.8)',
            hoverBackgroundColor: 'rgba(25,114,255,1)',
			      fontFamily: "Poppins",
            data: cantidadtres
          },
          {
            label: 'Hace 1 semana',
            backgroundColor: 'rgba(0,0,0,0.08)',
            hoverBackgroundColor: 'rgba(0,0,0,0.09)',
			      fontFamily: "Poppins",
            data: cantidadsemana
          }
        ]
		
      };

      var ctx = $("#hashtagcanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
		
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
