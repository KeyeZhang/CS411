<?php 
mysql_connect("localhost","sometimesnaive_dalao1","Dalaodalao1");
mysql_select_db('sometimesnaive_my_DB');
$team = $_GET['team'];
echo "<h1>The Score Leader</h1>";
$sql = "SELECT * FROM  player WHERE Teamname = '$team' AND Points = (SELECT DISTINCT MAX(Points) FROM player WHERE Teamname = '$team')";
$result =  mysql_query($sql) or die(mysql_error());
echo "<table>";
$first_row = true;
while ($row = mysql_fetch_assoc($result)){
	if ($first_row) {
        	$first_row = false;
        	echo '<tr>';
        	foreach($row as $key => $field) {
           		echo '<th>' . htmlspecialchars($key) . '</th>';
        				}
        	echo '</tr>';
        			}
        echo "<tr>";
	foreach ($row as $key => $field) {	
		echo '<td>' . htmlentities($field).'</td>';	
		}  
	echo '</tr>';
	}  
	echo '</table>';   
 ?>