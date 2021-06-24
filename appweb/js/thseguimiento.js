$(document).ready(function(){
  $.ajax({
    url: "http://192.168.65.5/UALTransfiere2/thseguimiento.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var hashtag = [];
      var cantidad = [];
  

      for(var i in data) {
        hashtag.push(data[i].hashtag)
        cantidad.push(data[i].counttotal)
      }

      var chartdata = {
        labels: hashtag,
        datasets : 
        [
          {
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.8)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0,0,0,0.2)",
              "rgba(0, 123, 255,0.5)"
            ],
			      fontFamily: "Poppins",
            data: cantidad,
          },
          
        ]
		
      };

      var ctx = $("#thseguimiento");

      var barGraph = new Chart(ctx, {
        type: 'polarArea',
        data: {
          datasets: [{
            data: cantidad,
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.8)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0,0,0,0.2)",
              "rgba(0, 123, 255,0.5)"
            ]

          }],
          labels: hashtag
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
