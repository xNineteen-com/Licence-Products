<?php
header("Content-type: text/xml"); 
echo '<?xml version="1.0" encoding="UTF-8"?>';
$db_host = 'HOST';
$db_user = 'DB_USER';
$db_pass = 'DB_PASS';
$db_name = 'DB_NAME';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

	if(isset($_GET['key']) && isset($_GET['domain']))
		{

		$key = $mysqli->real_escape_string($_GET['key']);
		$domain = $mysqli->real_escape_string($_GET['domain']);
		$domain = str_replace("http://", "", $domain);
		$domain = str_replace("/", "", $domain);
		$query = "SELECT `serial_no`,`domain`,`expire` FROM clients WHERE serial_no='".$key."' AND domain='".$domain."' AND active='1'";
		$results = $mysqli->query($query);
		$count_rows = $results->num_rows;
			if(count($count_rows) == "1")
				{
				while($row = $results->fetch_assoc())
					{
				echo "<LICENCE>";
				echo "<VALID>TRUE</VALID>";
				echo "<EXP>".$row['expire']."</EXP>";
				echo "</LICENCE>";
					}
				}else
					{
						echo "<LICENCE>";
						echo "<VALID>FALSE</VALID>";
						echo "<EXP>0</EXP>";
						echo "</LICENCE>";
					}
		}else
			{
			echo "<LICENCE>";
			echo "<VALID>FALSE</VALID>";
			echo "<EXP>0</EXP>";
			echo "</LICENCE>";
			}

?>