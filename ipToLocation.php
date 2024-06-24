<meta http-equiv="refresh" content="37" >

<font face="Arial">
<p style="font-family:Courier; color:Blue; font-size: 20px;">

<table >
<tbody>
<tr>
<td style="background-color: darkBlue;color:white;"><b>IP</td>
<td style="background-color: darkBlue;color:white;"><b>Country</td>
<td style="background-color: darkBlue;color:white;"><b>City</b></td>
<td style="background-color: darkBlue;color:white;"><b>Service Provider</b></td>
</tr>

<?php


Print("<b> IP and Location:</b><br>");
$db = new SQLite3('/home/pi/IP.db');
$res = $db->query('SELECT * FROM webaccess order by ID asc');

while ($row = $res->fetchArray(SQLITE3_ASSOC)){
	$IP = ($row['IP']);
	
	print('<p style="font-family:Courier; color:Blue; font-size: 20px;">');
	print('<tr>');
	print('<td style="background-color: lightblue;">'.$row['IP'].'</td>');
	print('<td style="background-color: lightblue;">'.$row['country'].'</td>');
	print('<td style="background-color: lightblue;">'.$row['city'].'</td>');
	print('<td style="background-color: lightblue;">'.$row['org'].'</td>');
	print('</tr>');

}
$db->close();
$db->close();

?>
</font>
