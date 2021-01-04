<?php
   include "../connection.php"; 

$jan=0;
$Query ="
SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 1 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$jan = $row['count(summon.OffenseID)'];
    }
    }

    $feb=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 2 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))

$feb = $row['count(summon.OffenseID)'];
    }
}

$march=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 3 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
 $march = $row['count(summon.OffenseID)'];
    }
}

$april=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 4 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$april = $row['count(summon.OffenseID)'];
    }
}

$may=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 5 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$may = $row['count(summon.OffenseID)'];
    }
}

$june=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 6 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$june = $row['count(summon.OffenseID)'];
    }
}

$july=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 7 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$july = $row['count(summon.OffenseID)'];
    }
}

$aug=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 8 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
 $aug = $row['count(summon.OffenseID)'];
    }
}

$sept=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 9 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$sept = $row['count(summon.OffenseID)'];
    }
}

$oct=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 10 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       

 $oct = $row['count(summon.OffenseID)'];
    }
}

$nov=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 11 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$nov = $row['count(summon.OffenseID)'];
    }
}

$dec=0;
$Query ="SELECT offense.OffenseName, count(summon.OffenseID), MONTH(summon.SummonDateTime)
    FROM summon LEFT JOIN offense ON summon.OffenseID = offense.OffenseID WHERE YEAR(summon.SummonDateTime) =2020 AND MONTH(summon.SummonDateTime) = 12 AND offense.OffenseName='Sticker Misuse' GROUP BY offense.OffenseName, MONTH(summon.SummonDateTime)";

    $Result = mysqli_query($con,$Query);
    if($Result)
    {
    if(mysqli_num_rows($Result))
    {
        while($row = mysqli_fetch_array($Result))
       
$dec = $row['count(summon.OffenseID)'];
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
							['Offense Month', 'Sticker Misuse'],

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
								title: 'TOTAL COUNT OF STICKER MISUSE SUMMONS BY EACH MONTH IN 2020',
						
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