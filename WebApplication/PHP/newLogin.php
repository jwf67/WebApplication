<?php
	echo "Successful.<br>";
	$serverName = "DESKTOP-U66TDOU\SQLEXPRESS"; //serverName\instanceName
	$databaseName = "testing";
	//$connectionInfo = array( "Database"=>"testing", "UID"=>"admin", "PWD"=>"admin");
	//$conn = odbc_connect( "Driver = {ODBC Driver 13 for SQL Server};Server=$serverName;Database=$databaseName;", "admin", "admin");
	$conn = odbc_connect( "SqlServer3", "admin", "admin");
	
	if( $conn ) {
		 echo "Connection established.<br />";
		 
		 $query = "SELECT * FROM users";
		 
		 $params = array('$id', '$_POST[un]', '$_POST[pw]', '$_POST[fn]', '$_POST[ln]');
		 $stmt = odbc_prepare($conn, $query);
		 $res = odbc_execute($stmt, $params);
		if (!$res) {
			print("SQL statement failed with error:\n");
			print("   ".mssql_get_last_message()."\n");
		} else {
			$id = odbc_num_rows($query);
			echo $id;
		}  
	}else{
		 echo "Connection could not be established.<br />";
		 die( print_r( sqlsrv_errors(), true));
	}
?>