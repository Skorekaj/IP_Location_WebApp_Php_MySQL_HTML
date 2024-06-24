<meta http-equiv="refresh" content="31" >
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<script>

<?php
$db = new SQLite3('/home/pi/IP.db');
$res = $db->query('select id, replace(substr(Date_Time,18,9), " " ,"") as month, count(Date_Time) as mycount FROM webaccess group by month order by id');
$countries = "[";
$count = "[";
while ($row = $res->fetchArray(SQLITE3_ASSOC)){
	#print($row['country']);
	#print($row['count(country)']);
	$countries = $countries . '"' .$row['month'] .'"' .",";
	$count = $count . $row['mycount'] .",";
	
}
$countries = $countries ."]";
$count = $count ."]";
print('var xValues = ' . $countries . ";\n");
print('var yValues = ' . $count . ";");
$db->close();
$db->close(); 
?>

<!--var xValues = ["Spain", "USA", "Argentina"];
<!--var yValues = [55, 49, 44, 24, 15,];
var barColors = "green";

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {display: true, text: "Web server - Access by Month"}
  }
 } 
);
</script>
<font face="Arial">
<p style="font-family:Courier; color:Blue; font-size: 20px;">
<table >
<tbody>

</body>
</html>

