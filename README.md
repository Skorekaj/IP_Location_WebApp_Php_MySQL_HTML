# Ip_Location_WebApp_Php_MySQL_HTML
IP tracking / IP analytics WebApp

The primary code is in the index.php file that picks up the IP address and stores it in the SQLite database, pulls out some sql queries and makes some somple graphs and stats as show in the wicki section.

Build:
---------------------------------------------------------------------------

Install SQL:

sudo apt-get install sqlite3 -y
sudo apt install sqlitebrowser -y

Python3 Code ———————————————————————-----------------------------------------

import sqlite3

dbconnect = sqlite3.connect("new.db");
cursor = dbconnect.cursor();
dbconnect.row_factory = sqlite3.Row;

cursor.execute('SELECT * FROM one');

for row in cursor:
    print (row[0]);

dbconnect.close();

————————————————————————————————-----------------------------------------------------
DB file = one.db
DB table = one and has ID, Name and Name
￼
—————————————————————------------------————————
PHP code for the web page once the web server and SQL server have been setup as per (With PHP (works on 64bit))
<?php
print('<p style="font-family:Courier; color:Blue; font-size: 20px;">');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3('/home/pi/new.db');

$res = $db->query('SELECT * FROM one order by fname LIMIT 1000');
print ('<b>Results: </b><br><br>');
print ("");
while ($row = $res->fetchArray(SQLITE3_ASSOC)){
	print($row['Fname'] . '.' . $row['Lname'] . '@gmail.com' . '<br>');
}
print('</p>');
$db->close();
# ---------------------------- working ---------------------------------
#$db = new SQLite3('new.db');
#$allProductsQuery = "SELECT * FROM one";
#$productList = $db->query($allProductsQuery);
#while ($row = $productList->fetchArray(SQLITE3_ASSOC)){
#  echo $row['Fname'] . " " . $row['Lname'] . '<br/>';
#}        
?>
