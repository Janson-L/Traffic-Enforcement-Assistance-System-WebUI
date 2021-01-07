<?php
   include "../connection.php"; 

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
         <?php
         $sql = "SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) = 2021 AND MONTH(summon.SummonDateTime) = 10 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['OffenseName']."',".$result['count(summon.OffenseID)']."],";
          }

         ?>
        ]);

        var options = {
          title: 'TYPE OF SUMMONS WITH TOTAL COUNTS IN OCTOBER'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
        
        

function myFunction() {
    window.print();
}
    </script>
  </head>
    
<button class="w3-bar w3-light-grey w3-round w3-display-bottom middle w3-show-small w3-button" onClick="myFunction()">Print</button></br></br><table width="200" border="1">
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
      
  </body>
</html>