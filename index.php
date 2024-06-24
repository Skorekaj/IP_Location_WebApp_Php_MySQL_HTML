<! ––<meta http-equiv="refresh" content="8" >

<font face="Arial">
<table >
<tbody>
<tr>
<td style="background-color: lightgrey;"><b>IP</td>
<td style="background-color: lightgrey;"><b>Country</td>
<td style="background-color: lightgrey;"><b>Org</td>
<td style="background-color: lightgrey;"><b>Count</b></td>
</tr>
</font>
<?php
#shell_exec("python3 /home/pi/alarm_mp3.py");
#exec('python3 /home/pi/alarm_mp3.py');
#system("python3 /home/pi/alarm_mp3.py");

$IP = $_SERVER['REMOTE_ADDR'];
$host = $_SERVER['REMOTE_HOST'];
$agent = $_SERVER['HTTP_USER_AGENT'];
#print("Remote Host: ".$agent);


print('<p style="font-family:Courier; color:Blue; font-size: 20px;">');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3('/home/pi/IP.db');

$res = $db->query('select IP, country, org, count(country) from webaccess group by IP order by count(country) DESC LIMIT 10');
print ('<b>Top 10 IPs that for some reason keeps accesing this website ??? ');
print ("");
while ($row = $res->fetchArray(SQLITE3_ASSOC)){
#	print($row['ip'] . ' ' . $row['mac'] . ' ' . $row['vendor'] . ' ' . $row['description'] . ' ' . $row['known'] . '<br>');
	print('<tr>');
	print('<td style="background-color: lightblue;">' . $row['IP'] .'</td>');
	print('<td style="background-color: lightblue;">' . $row['country'] .'</td>');
	print('<td style="background-color: lightblue;">' . $row['org'] .'</td>');
	print('<td style="background-color: lightblue;">' . $row['count(country)'] .'</td>');
	print('</tr>');
}
print('</p>');

$MyDate = date("Y-m-d");
#print($MyDate . ' ') ;
$MyTime = date("G.i:s<br>", time());
#print date("m/d/y G.i:s<br>", time()); 
#print $MyTime;
$query = $db->exec('INSERT INTO webaccess(Date_Time,IP) VALUES("'.$MyTime.'","'.$IP.'")');

$db->close();

?>
</tbody>
</table>


<table >
<tbody>
<tr>
<td style="background-color: lightgrey;"><b>Month</td>
<td style="background-color: lightgrey;"><b>Count</b></td>
<td style="background-color: lightgrey;"><b></b></td>
</tr>
<BR>

<?php
print ('<b>Access Per Month ');

$db = new SQLite3('/home/pi/IP.db');
$res = $db->query('select id, replace(substr(Date_Time,18,9), " " ,"") as month, count(Date_Time) as mycount FROM webaccess group by month order by id');
$countries = "[";
$count = "[";

while ($row = $res->fetchArray(SQLITE3_ASSOC)){
	print('<tr>');
	print('<td style="background-color: lightblue;">' . $row['month'] .'</td>');
	print('<td style="background-color: lightblue;">' . $row['mycount'] .'</td>');
	print('<td style="background-color: lightblue;"> &nbsp;');
	foreach(range(1, $row['mycount']) as $i)
		echo '<img src="space.jpeg" width="0.3" height="12">'; 
	print('&nbsp;</tr>');
	$countries = $countries . '"' .$row['month'] .'"' .",";
	$count = $count . $row['mycount'] .",";

}
print('</p>');

$db->close();
?>

</tbody>
</table>

<?php


  if(isset($_POST["textareaValue"])) {
    $fp = fopen('Comments.txt', 'a');
    fwrite($fp, $MyTime);
    fwrite($fp, $_POST["textareaValue"]);
    fwrite($fp, "\r\n");
    fclose($fp);
    sleep(5);
  }

?>

<html>
  <body>
    <BR><B>Why do you keep comming here ?
    <form method="post">
      <textarea id="name" name="textareaValue" size="25" maxlength="255" row="2" style="width:560px; height:150px;"/></textarea>
      <br><br><input type="submit" value="Answer" />
    </form>
  </body>
</html>
<a href="http://skorekaj.synology.me/graph.php">Access Countries Graph</a><br>
<a href="http://skorekaj.synology.me/mgraph.php">Access Monthly Graph</a><br>
<a href="http://skorekaj.synology.me/hgraph.php">Access Monthly HGraph</a><br>

