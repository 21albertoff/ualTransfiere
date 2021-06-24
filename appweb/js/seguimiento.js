$(document).ready(function(){
  $.ajax({
    url: "http://192.168.65.5/UALTransfiere2/datosseguimiento.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var valores1 = 0;
      var valores2 = 0;
      var valores3 = 0;
      var valores4 = 0;
      var valores5 = 0;
      var valores6 = 0;
      var valores7 = 0;
      var valores8 = 0;
      var valores9 = 0;
      var valores10 = 0;
      var valores11 = 0;
      var cantidad = [];
      var nombre = ""
      

      for(var i in data) {
        valores1 = data[i].semana0
        valores2 = data[i].semana1
        valores3 = data[i].semana2
        valores4 = data[i].semana3
        valores5 = data[i].semana4
        valores6 = data[i].semana5
        valores7 = data[i].semana6
        valores8 = data[i].semana7
        valores9 = data[i].semana8
        valores10 = data[i].semana9
        valores11 = data[i].semana10
        nombre = data[i].Nombre
      }

      cantidad.push(valores1);
      cantidad.push(valores2);
      cantidad.push(valores3);
      cantidad.push(valores4);
      cantidad.push(valores5);
      cantidad.push(valores6);
      cantidad.push(valores7);
      cantidad.push(valores8);
      cantidad.push(valores9);
      cantidad.push(valores10);
      cantidad.push(valores11);

      var chartdata = {
        labels: ["Semana 1", "Semana2", "Semana3", "Semana4", "Semana5", "Semana6", "Semana 7","Semana 8","Semana 9","Semana 10","Semana 11"],
        datasets : [
          {
            label: nombre,
            backgroundColor: 'rgba(0,103,255,.15)',
            borderColor: 'rgba(0,103,255,0.5)',
            borderWidth: 3.5,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(0,103,255,0.5)',
			      fontFamily: "Poppins",
            data: cantidad
          }
        ]
		
      };

      var ctx = $("#seguimiento");
      ctx.height = 150;

      var barGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
		
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
