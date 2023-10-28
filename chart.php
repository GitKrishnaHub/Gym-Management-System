

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="css/chart.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
    <?php $page = 'chart';
    include 'sidebar.php' ?>
    <div class="piechart">
    
    <div id="piechart">
    
    <?php
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gym";
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        $qry = "select gender, count(*) as number from member group by gender";
        $result = mysqli_query($conn, $qry);
        ?>
    </div>
    <div id="piechart1">
        
    <?php
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gym";
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        $qry = "select designation, count(*) as number from staff group by designation";
        $result1 = mysqli_query($conn, $qry);
        ?>
    </div>
    </div>
   
    
    
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Gender', 'Number'],
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "['" . $row["gender"] . "', " . $row["number"] . "],";
                }
                ?>
            ]);
            var options = {
                title: 'Percentage of Male and Female Members',
                  is3D:true,  
                pieHole: 0.4
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>


    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['designation', 'Number'],
                <?php
                while ($row = mysqli_fetch_array($result1)) {
                    echo "['" . $row["designation"] . "', " . $row["number"] . "],";
                }
                ?>
            ]);
            var options = {
                
                title: 'Percentage of staff designation',
                  is3D:true,  
                pieHole: 0.4
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
            chart.draw(data, options);
        }
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