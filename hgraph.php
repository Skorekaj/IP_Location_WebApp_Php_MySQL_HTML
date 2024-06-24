<meta http-equiv="refresh" content="23" >

<font face="Arial">
<table >
<tbody>
</font>

<?php
$db = new SQLite3('/home/pi/IP.db');
$res = $db->query('select id, replace(substr(Date_Time,18,9), " " ,"") as month, count(Date_Time) as mycount FROM webaccess group by month order by id');
$countries = "[";
$count = "[";
print('<tr>');

while ($row = $res->fetchArray(SQLITE3_ASSOC)){
	$month = $month . '"' .$row['month'] .'"' .",";
	$count = $count . $row['mycount'] .",";
	$newcount = 0.2 * $row['mycount'];

	$month = $month . '"' .$row['month'] .'"' .",";
	$count = $count . $row['mycount'] .",";
	print('<td valign="bottom" style="background-color: white; "><b>');
	echo ('<img src="spacel.jpeg" width="40" height="'.$newcount.'">'); 
	print('</b></td>');	
}

print('</tr>');
print('<tr>');

while ($row = $res->fetchArray(SQLITE3_ASSOC)){
	print('<td style="background-color: white;"><b>'.$row['mycount'].'</td>');
}
print('</tr>');
print('<tr>');

while ($row = $res->fetchArray(SQLITE3_ASSOC)){
	print('<td style="background-color: lightgrey;"><b>'.$row['month'].'</td>');

}
print('</tr>');

$db->close();
$db->close();

?>


</tr>
