<?php

function fetchMyUsers(){	
    session_start();
    include("connection.php");
    include("functions.php");
		$stmt = $con->prepare("select * from user where not first_name='admin'");				
	$stmt->execute();			
	$result = $stmt->get_result();		
	return $result;	
}
function fetchOthersUsers($site, $SiteOwner){	
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $site);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$contents = curl_exec($ch);
		$jsoned = json_decode($contents, true);
		echo "<table border='2'>";
        echo "<thead><b>Company:". $SiteOwner ."'s Company</b></thead>";
        echo "<tr>";
        echo "<th>User's Name</th>";
        echo "</tr>";
		echo "<tr>";
		echo "<td>" . str_replace("Name:","",$contents ) . "</td>";
		echo "</tr>";
		curl_close($ch);
	}	
}

