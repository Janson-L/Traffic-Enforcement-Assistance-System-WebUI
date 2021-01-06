<?php
   include "../connection.php"; 

$jan=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 1 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$jan = $row['totalPaid'];
    }
    }

    $feb=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 2 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))

$feb = $row['totalPaid'];
    }
}

$march=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 3 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
 $march = $row['totalPaid'];
    }
}

$april=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 4 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$april = $row['totalPaid'];
    }
}

$may=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 5 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$may = $row['totalPaid'];
    }
}

$june=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 6 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$june = $row['totalPaid'];
    }
}

$july=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 7 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$july = $row['totalPaid'];
    }
}

$aug=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 8 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
 $aug = $row['totalPaid'];
    }
}

$sept=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 9 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$sept = $row['totalPaid'];
    }
}

$oct=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 10 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       

 $oct = $row['totalPaid'];
    }
}

$nov=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 11 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$nov = $row['totalPaid'];
    }
}

$dec=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime), offense.CompoundRate*COUNT(summon_payment.PaymentID) AS totalPaid FROM summon LEFT JOIN offense 
ON summon.OffenseID = offense.OffenseID LEFT JOIN summon_payment ON summon.SummonID = summon_payment.SummonID LEFT JOIN payment ON payment.PaymentID = summon_payment.PaymentID
WHERE YEAR(summon.SummonDateTime)=2020 AND MONTH(summon.SummonDateTime) = 12 AND offense.OffenseName='Illegal Parking' AND summon.OffenseID=2 GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$dec = $row['totalPaid'];
    }
}




?>

	<main>

		<div>
			<section class="section">
				
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				<script type="text/javascript">
					google.charts.load('current', {'packages':['bar']});
					google.charts.setOnLoadCallback(drawChart);
					function drawChart() {
						var data = google.visualization.arrayToDataTable([
							['Months', 'Total Money(RM)'],

							['January',<?php echo $jan; ?>],
  							['February',<?php echo $feb; ?>],
 							['March', <?php echo $march; ?>],
  							['April',<?php echo $april; ?>],
  							['May',<?php echo $may; ?>],
 	                        ['June',<?php echo $june; ?>],
                            ['July', <?php echo $july; ?>],
                            ['August',<?php echo $aug; ?>],
                            ['September',<?php echo $sept; ?>],
                            ['October',<?php echo $oct; ?>],
                            ['November',<?php echo $nov; ?>],
                            ['December',<?php echo $dec; ?>]
]);
						var options = {
							chart: {
								title: 'TOTAL COUNT OF MONEY (RM) COLLECTED FROM THE STUDENT PAID THE "ILLEGAL PARKING" SUMMONS IN 2020',
						
							}
						};

						var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

						chart.draw(data, google.charts.Bar.convertOptions(options));
				
                    
                    };
				</script>
				
				<div id="columnchart_material" style="width: 100%; height: 450px; margin-left: auto; margin-right: auto;"></div><br>
                <div id="columnchart_material2" style="width: 100%; height: 450px; margin-left: auto; margin-right: auto;"></div>
				
				
			</section>
		</div>
	</main>