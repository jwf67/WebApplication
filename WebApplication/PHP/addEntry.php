<?php
	echo "<div>Successful.</div><br>";
	$serverName = "DESKTOP-U66TDOU\SQLEXPRESS"; //serverName\instanceName
	$databaseName = "testing";
	//$connectionInfo = array( "Database"=>"testing", "UID"=>"admin", "PWD"=>"admin");
	//$conn = odbc_connect( "Driver = {ODBC Driver 13 for SQL Server};Server=$serverName;Database=$databaseName;", "admin", "admin");
	$conn = odbc_connect( "SqlServer3", "admin", "admin");
	
	$id = uniqid();
	if( $conn ) {
		 echo "<div>Connection established.</div><br />";
		 //add new person into database
		 $query = "INSERT INTO users (id,name,year) VALUES ('$id', '$_POST[fn]', '$_POST[ln]', '$_POST[dob]', '$_POST[major]', '$_POST[gpa]')";
		 
		 $params = array($id, '$_POST[fn]', '$_POST[ln]', '$_POST[dob]', '$_POST[major]', '$_POST[gpa]');
		 $stmt = odbc_prepare($conn, $query);
		 $res = odbc_execute($stmt, $params);
		if (!$res) {
			print("SQL statement failed with error:\n");
			print("   ".mssql_get_last_message()."\n");
		} else {
			echo '<div>Submission Completed.</div>';
		}  
	}else{
		 echo '<p>Connection could not be established.</p><br />';
		 die( print_r( sqlsrv_errors(), true));
	}
?>
<html>
<head><title>Item Submission</title></head>
<link rel="stylesheet" href="../CSS/standard.css">
<body>
</body>
</html>