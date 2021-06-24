$(document).ready(function(){
  $.ajax({
    url: "http://192.168.65.5/UALTransfiere2/datosseguimientoh.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var valores1 = [];
      var valores2 = [];
      var valores3 = [];
      var valores4 = [];
      var valores5 = [];
      var valores6 = [];
      var valores7 = [];
      var valores8 = [];
      var valores9 = [];
      var valores10 =[];
      var valores11 =[];
      var nombre = []
      var cantidad = []    

      for(var i in data) {
        valores1.push(data[i].semana0)
        valores2.push(data[i].semana1)
        valores3.push(data[i].semana2)
        valores4.push(data[i].semana3)
        valores5.push(data[i].semana4)
        valores6.push(data[i].semana5)
        valores7.push(data[i].semana6)
        valores8.push(data[i].semana7)
        valores9.push(data[i].semana8)
        valores10.push(data[i].semana9)
        valores11.push(data[i].semana10)
        nombre.push(data[i].Nombre)
      }

      var chartdata = {
        labels: ["Semana 1", "Semana2", "Semana3", "Semana4", "Semana5", "Semana6", "Semana 7","Semana 8","Semana 9","Semana 10","Semana 11"],
        datasets : 
        [
          {
            label: nombre[0],
            backgroundColor: 'transparent',
            borderColor: 'rgba(220,53,69,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(220,53,69,0.75)',
			      fontFamily: "Poppins",
            data: [valores1[0],valores2[0],valores3[0],valores4[0],valores5[0],valores6[0],valores7[0], valores8[0],valores9[0], valores10[0],valores11[0]]
          },
          {
            label: nombre[1],
            backgroundColor: 'transparent',
            borderColor: 'rgba(40,167,69,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(40,167,69,0.75)',
			      fontFamily: "Poppins",
            data: [valores1[1],valores2[1],valores3[1],valores4[1],valores5[1],valores6[1],valores7[1], valores8[1],valores9[1], valores11[1],valores11[1]]
          },
        ]
		
      };

      var ctx = $("#seguimientoh");
      ctx.height = 100;

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
