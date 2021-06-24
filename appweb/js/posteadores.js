$(document).ready(function(){
  $.ajax({
    url: "http://192.168.65.5/UALTransfiere2/topposteadores.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var nickname = [];
      var cantidad = [];
      var cantidadtres = [];
      var cantidadsemana = [];

      for(var i in data) {
        nickname.push(data[i].nickname);
        cantidad.push(data[i].tweets);
        cantidadtres.push(data[i].tweetstres);
        cantidadsemana.push(data[i].tweetssemana);
      }


      var chartdata = {
        labels: nickname,
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

      var ctx = $("#usuarioscanvas");

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
