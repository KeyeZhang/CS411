<!DOCTYPE html>
<html>
<head>
<title>NBA Game On</title>

<link href="form.css" type="text/css" rel="stylesheet">

</head>
<body>

<div class="header">

    <div class="container">

        <ul class="nav">

        <a href ="./login_page.html"><li>Profile</li></a>

        <a href="./signup_page.html"><li>Setting</li></a>

        <a href="./index.html"><li>Search</li></a>

        <li>Contact</li>

        </ul>

    </div>

</div>


<div class="jumbotron">

    <div class="container">

        <div class="main">

            
        </div>

    </div>

</div>



<div style="width: 100%; overflow:auto;">

<?php
mysql_connect("localhost","sometimesnaive_dalao1","Dalaodalao1");
mysql_select_db('sometimesnaive_my_DB');


$search = $_POST['TITLE'];
$selectoption = $_POST['rankStandard'];

if($search != ''){
	if ($selectoption == 'player') {
		if (preg_match("/^[a-zA-Z]+/", $search)) {
			$sql = "SELECT * FROM player WHERE name LIKE '%$search%' ";
			$result =  mysql_query($sql) or die(mysql_error());
			if (mysql_num_rows($result)==0) {
				echo "<p>No result is found in $selectoption category, please check your input.</p>";
			}
			echo "<table>";
			$first_row = true;
			while ($row = mysql_fetch_assoc($result)) {
					if ($first_row) {
        				$first_row = false;
                        echo '<thead>';
        				echo '<tr>';
        				foreach($row as $key => $field) {
           					echo '<th>' . htmlspecialchars($key) . '</th>';
        				}
        				echo '</tr>';
                        echo '</thead>';
        			}
                    echo '<tbody>';
        			echo '<tr>';
					foreach ($row as $key => $field) {	
						echo '<td>' . htmlentities($field).'</td>';	
					}
								
			 	echo "</tr>";
			}
                echo '</tbody>';
				echo '</table>';
		}
			else{
				echo "<p>Please input English letters!</p>";
			}
	}
	elseif ($selectoption == 'team') {
		if (preg_match("/^[a-zA-Z0-9]+/", $search)) {
			$sql = "SELECT * FROM Teams_Statistics WHERE Team_name LIKE '%$search%' ";
			$result =  mysql_query($sql) or die(mysql_error());
			if (mysql_num_rows($result)==0) {
				echo "<p>No result is found in $selectoption category, please check your input.</p>";
			}
            
			echo '<table>';
			$first_row = true;
			while ($row = mysql_fetch_assoc($result)) {
					if ($first_row) {
        				$first_row = false;
                        echo '<thead>';
        				echo '<tr>';
        				foreach($row as $key => $field) {
           					echo '<th>' . htmlspecialchars($key) . '</th>';
        				}
        				echo '</tr>';
                        echo '</thead>';
        			}
        			echo '<tr>';
					foreach ($row as $key => $field) {	
						echo '<td>' . htmlentities($field).'</td>';	
					}
								
			 	echo '</tr>';
			}
                echo '</tbody>';
                echo '</table>';
            
		}
			else{
				echo "<p>Please input English letters or numbers!</p>";
			}		
	}
}
else{
	echo "<p>Please enter a search query</p>";
}
?>
</div>


</body>
</html>

