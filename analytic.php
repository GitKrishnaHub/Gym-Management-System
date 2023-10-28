<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/analytic.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Gym Management System</title>
</head>
<body>
<?php $page = 'analytic';
    include 'sidebar.php' ?>
<?php 
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gym";
    $con = new mysqli($host, $dbusername, $dbpassword, $dbname);
  
  $query = $con->query("
    SELECT 
      services as services,
        SUM(amount) as amount
    FROM member
    GROUP BY services
  ");

  foreach($query as $data)
  {
    $services[] = $data['services'];
    $amount[] = $data['amount'];
  }

?>

<div class="ana">
<div class="analytic">
  <canvas id="myChart"></canvas>
</div>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($services) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Total Members In Services',
      data: <?php echo json_encode($amount) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
<script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {
      
                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-" ) {
                resetMenu();            
                } 
                // else, send page to designated URL            
                else {  
                    document.location.href = newURL;
                }
            }
        }
        // resets the menu selection upon entry to this page:
        function resetMenu() {
            document.gomenu.selector.selectedIndex = 2;
        }
    </script>  
</body>
</html>