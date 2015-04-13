<?php

function call($key, $domain, $mysqli)
	{
		$xml = file_get_contents('http://".$_SERVER['HTTP_HOST']."/server.php?key='.$key.'&domain='.$domain);
		$string = simplexml_load_string($xml);
		$date = date('d/m/Y');
		$string_valid = $string->VALID;
		$string_exp = $string->EXP;
		if ($string === false)
		{
		$find = "SELECT `id`,`settings` FROM `configs` WHERE `id`='6'";
		$result = $mysqli->query($find);
		while ($row = $result->fetch_assoc())
		{
		if(strtotime($row['settings']) < $date)
		{
		//true
		}else{
		echo "<td width='100%' height='100%' align='center'>Payment Failed</td>";
		
		}
		
		}
		}else{
		if($string_valid == "TRUE")
		{
		$sql = "UPDATE configs SET settings='".$string_exp."' WHERE id='6'";
		if($mysqli->query($sql) == TRUE)
		{
		echo "update works";
		}
		}else{
		echo "<td width='100%' height='100%' align='center'>Payment Failed</td>";
		}
		
		}
	
	
	
	}
	?>