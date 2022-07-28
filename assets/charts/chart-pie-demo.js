// Pie Chart del Inicio
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Aceptado", "Observado", "Rechazado"],
    datasets: [{
      data: [3, 5, 1],
      backgroundColor: ['#007bff', '#ffc107','#dc3545'],
    }],
  },  
});
