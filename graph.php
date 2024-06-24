<meta http-equiv="refresh" content="33" >
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
<canvas id="myChart" style="width:100%;max-width:1000px"></canvas>
<script>

<?php
$db = new SQLite3('/home/pi/IP.db');
$res = $db->query('select country, count(country) from webaccess group by country');
$countries = "[";
$count = "[";
while ($row = $res->fetchArray(SQLITE3_ASSOC)){
	#print($row['country']);
	#print($row['count(country)']);
	$countries = $countries . '"' .$row['country'] .'"' .",";
	$count = $count . $row['count(country)'] .",";
	
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
var barColors = "Blue";

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
    title: {display: true, text: "Web server - Accessed by Country"}
  }
 } 
);
</script>
<font face="Arial">
<p style="font-family:Courier; color:Blue; font-size: 20px;">
<table >
<tbody>
<tr>
<td style="background-color: darkBlue;color:white;"><b></td>
<td style="background-color: darkBlue;color:white;"><b>Country</td>
<td style="background-color: darkBlue;color:white;"><b>Count</td>
<td style="background-color: darkBlue;color:white;"><b></td>
<?php
$db = new SQLite3('/home/pi/IP.db');
$res = $db->query('select country, count(country) from webaccess group by country order by count(country) DESC');
$countries = "[";
$count = "[";
while ($row = $res->fetchArray(SQLITE3_ASSOC)){
	#echo $row['count(country)'];
	if ($row['country'] == "Denmark") {$flag = "dk";}
	if ($row['country'] == "Sweden") {$flag = "se";}
	if ($row['country'] == "United Kingdom") {$flag = "gb";}
	if ($row['country'] == "United States") {$flag = "us";}
	if ($row['country'] == "Netherlands") {$flag = "nl";}
	if ($row['country'] == "Russia") {$flag = "ru";}
	if ($row['country'] == "China") {$flag = "cn";}
	if ($row['country'] == "Germany") {$flag = "de";}
	if ($row['country'] == "Belgium") {$flag = "be";}
	if ($row['country'] == "France") {$flag = "fr";}
	if ($row['country'] == "Brazil") {$flag = "br";}
	if ($row['country'] == "Hong Kong") {$flag = "hk";}
	if ($row['country'] == "Poland") {$flag = "pl";}
	if ($row['country'] == "Vietnam") {$flag = "vn";}
	if ($row['country'] == "Ukraine") {$flag = "ua";}
	if ($row['country'] == "Switzerland") {$flag = "ch";}
	if ($row['country'] == "Iran") {$flag = "ir";}
	if ($row['country'] == "India") {$flag = "in";}
	if ($row['country'] == "Indonesia") {$flag = "id";}
	if ($row['country'] == "Australia") {$flag = "au";}
	if ($row['country'] == "Singapore") {$flag = "sg";}
	if ($row['country'] == "Canada") {$flag = "ca";}
	if ($row['country'] == "Italy") {$flag = "it";}
	if ($row['country'] == "Spain") {$flag = "es";}
	if ($row['country'] == "Argentina") {$flag = "ar";}
	if ($row['country'] == "Palestine") {$flag = "ps";}
	if ($row['country'] == "Turkey") {$flag = "tr";}
	if ($row['country'] == "Ireland") {$flag = "ie";}
	if ($row['country'] == "Bulgaria") {$flag = "bg";}
	if ($row['country'] == "Taiwan") {$flag = "tw";}
	if ($row['country'] == "Kenya") {$flag = "ke";}
	if ($row['country'] == "Thailand") {$flag = "th";}
	if ($row['country'] == "Ecuador") {$flag = "ec";}
	if ($row['country'] == "Cambodia") {$flag = "kh";}
	if ($row['country'] == "Bangladesh") {$flag = "bd";}
	if ($row['country'] == "Mongolia") {$flag = "mn";}
	if ($row['country'] == "Finland") {$flag = "fi";}
	if ($row['country'] == "Japan") {$flag = "jp";}
	if ($row['country'] == "Bolivia") {$flag = "bo";}
	if ($row['country'] == "Mexico") {$flag = "mx";}
	if ($row['country'] == "Luxembourg") {$flag = "lu";}
	if ($row['country'] == "Czechia") {$flag = "cz";}
	if ($row['country'] == "Serbia") {$flag = "rs";}
	if ($row['country'] == "Morocco") {$flag = "ma";}
	if ($row['country'] == "Croatia") {$flag = "hr";}
	if ($row['country'] == "Colombia") {$flag = "co";}
	if ($row['country'] == "Greece") {$flag = "gr";}
	if ($row['country'] == "Egypt") {$flag = "eg";}
	if ($row['country'] == "South Korea") {$flag = "kr";}
	if ($row['country'] == "South Africa") {$flag = "za";}
	if ($row['country'] == "Pakistan") {$flag = "pk";}
	if ($row['country'] == "Nigeria") {$flag = "ne";}
	if ($row['country'] == "Kazakhstan") {$flag = "kz";}
	if ($row['country'] == "Hungary") {$flag = "hu";}
	if ($row['country'] == "Georgia") {$flag = "ge";}
	if ($row['country'] == "Venezuela") {$flag = "ve";}
	if ($row['country'] == "United Arab Emirates") {$flag = "ae";}
	if ($row['country'] == "Syria") {$flag = "sy";}
	if ($row['country'] == "Romania") {$flag = "ro";}
	if ($row['country'] == "Palau") {$flag = "pw";}
	if ($row['country'] == "Nepal") {$flag = "np";}
	if ($row['country'] == "Malaysia") {$flag = "my";}
	if ($row['country'] == "Dominican Republic") {$flag = "do";}
	if ($row['country'] == "Chile") {$flag = "cl";}
	if ($row['country'] == "Austria") {$flag = "at";}
	if ($row['country'] == "Zimbabwe") {$flag = "zw";}
	if ($row['country'] == "Trinidad and Tobago") {$flag = "tt";}
	if ($row['country'] == "Tanzania") {$flag = "tz";}
	if ($row['country'] == "Portugal") {$flag = "pt";}
	if ($row['country'] == "Philippines") {$flag = "ph";}
	if ($row['country'] == "Norway") {$flag = "no";}
	if ($row['country'] == "North Macedonia") {$flag = "mk";}
	if ($row['country'] == "Nicaragua") {$flag = "ni";}
	if ($row['country'] == "Malawi") {$flag = "mw";}
	if ($row['country'] == "Ghana") {$flag = "gh";}
	if ($row['country'] == "Bosnia and Herzegovina") {$flag = "ba";}
	if ($row['country'] == "Albania") {$flag = "al";}
	if ($row['country'] == "Puerto Rico") {$flag = "pr";}
	if ($row['country'] == "Peru") {$flag = "pe";}
	if ($row['country'] == "Paraguay") {$flag = "py";}
	if ($row['country'] == "New Zealand") {$flag = "nz";}
	if ($row['country'] == "Myanmar") {$flag = "mm";}
	if ($row['country'] == "Mozambique") {$flag = "mz";}
	if ($row['country'] == "Lithuania") {$flag = "lt";}
	if ($row['country'] == "Latvia") {$flag = "lv";}
	if ($row['country'] == "Kosovo") {$flag = "ie";}
	if ($row['country'] == "Honduras") {$flag = "hn";}
	if ($row['country'] == "Guatemala") {$flag = "gt";}
	if ($row['country'] == "Equatorial Guinea") {$flag = "gq";}
	if ($row['country'] == "Cameroon") {$flag = "cm";}
	if ($row['country'] == "Botswana") {$flag = "bw";}
	if ($row['country'] == "Slovenia") {$flag = "sl";}
	if ($row['country'] == "Moldova") {$flag = "md";}
	if ($row['country'] == "Iraq") {$flag = "iq";}
	if ($row['country'] == "Estonia") {$flag = "ee";}
	if ($row['country'] == "Cayman Islands") {$flag = "ky";}
	if ($row['country'] == "Belarus") {$flag = "by";}
	if ($row['country'] == "Uruguay") {$flag = "uy";}
	if ($row['country'] == "Tonga") {$flag = "to";}
	if ($row['country'] == "Kyrgyzstan") {$flag = "kg";}
	if ($row['country'] == "Kuwait") {$flag = "kw";}
	if ($row['country'] == "Jordan") {$flag = "jo";}
	if ($row['country'] == "Israel") {$flag = "il";}
	if ($row['country'] == "Burundi") {$flag = "bi";}
	if ($row['country'] == "Uzbekistan") {$flag = "uz";}
	if ($row['country'] == "Uganda") {$flag = "ug";}
	if ($row['country'] == "Slovakia") {$flag = "sk";}
	if ($row['country'] == "Saudi Arabia") {$flag = "sa";}
	if ($row['country'] == "Qatar") {$flag = "qa";}
	if ($row['country'] == "Panama") {$flag = "pa";}
	if ($row['country'] == "Lebanon") {$flag = "lb";}
	if ($row['country'] == "Jamaica") {$flag = "jm";}
	if ($row['country'] == "Isle of Man") {$flag = "im";}
	if ($row['country'] == "Gambia") {$flag = "gm";}
	if ($row['country'] == "Fiji") {$flag = "fj";}
	if ($row['country'] == "El Salvador") {$flag = "sv";}
	if ($row['country'] == "Cyprus") {$flag = "cy";}
	if ($row['country'] == "Costa Rica") {$flag = "cr";}
	if ($row['country'] == "Barbados") {$flag = "bb";}
	if ($row['country'] == "Angola") {$flag = "ao";}
	if ($row['country'] == "Algeria") {$flag = "dz";}

	print('<tr>');
	print('<td style="background-color: lightblue;"><img src="https://flagcdn.com/16x12/'.$flag.'.png"></td>');
	print('<td style="background-color: lightblue;">'.$row['country'].'</td>');
	print('<td style="background-color: lightblue;">&nbsp;'.$row['count(country)'].'</td>');
	print('<td style="background-color: lightblue;"> &nbsp;');
	foreach(range(1, $row['count(country)']) as $i)
		echo '<img src="space.jpeg" width="0.1" height="10">'; 
	print('&nbsp;</td>');
}
		print('</tr>');
$db->close();
$db->close(); 
?>
</body>
</html>

