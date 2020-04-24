<?php
session_start();
require 'db.php';

if(isset($_POST['delete'])){
	$SCP_ID		= mysqli_real_escape_string($mysqli,$_POST['delete']);
	$query = "DELETE FROM `SCP_LIST` WHERE `SCP_LIST`.`SCP_ID` = $SCP_ID";
	if (mysqli_query($mysqli, $query)) {	    
		     $_SESSION['msg'] = "SCP_ID [".$SCP_ID."] Delete Success";
		    header('location: crud.php');
		} else {
		    $_SESSION['msg'] = "Error: " . $query . "<br>" . mysqli_error($mysqli);
		}
}



if(isset($_POST['edit'])){
	$SCP_ID = mysqli_real_escape_string($mysqli,$_POST["edit"]);
	$result = mysqli_query($mysqli,"SELECT * FROM SCP_LIST WHERE SCP_ID=$SCP_ID");             
	if (mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_array($result);
	   //echo $row['Description']);
	    echo json_encode($row);
	}
}




if(isset($_POST['save'])){
	$SCP_ID		= mysqli_real_escape_string($mysqli,$_POST['SCP_ID']);
	$SCP 		= mysqli_real_escape_string($mysqli,$_POST['SCP']);
	$Description= mysqli_real_escape_string($mysqli,$_POST['Description']);
	$Reference	= mysqli_real_escape_string($mysqli,$_POST['Reference']);
	$Addendum	= mysqli_real_escape_string($mysqli,$_POST['Addendum']);
	$History	= mysqli_real_escape_string($mysqli,$_POST['History']);
	$space		= mysqli_real_escape_string($mysqli,$_POST['space']);
	$Additional	= mysqli_real_escape_string($mysqli,$_POST['Additional']);

	

	$query = "INSERT INTO SCP_LIST (SCP_ID,Special_Containment_Procedure,Description,Reference,Addendum, Chronological_History,Space_Time_Anomalies,Additional_Notes) VALUES ($SCP_ID,'$SCP','$Description','$Reference','$Addendum','$History','$space','$Additional') ";

	if (mysqli_query($mysqli, $query)) {	    
	    $_SESSION['msg'] = "SCP_ID [".$SCP_ID."] Save Success";
	    header('location: crud.php');
	} else {
	    $_SESSION['msg'] = "Error saving SCP_ID [".$SCP_ID."].". mysqli_error($mysqli);
	    
	    header('location: crud.php');
	}

	}

	if(isset($_POST['update'])){
	$SCP_ID		= mysqli_real_escape_string($mysqli,$_POST['SCP_ID']);
	$SCP 		= mysqli_real_escape_string($mysqli,$_POST['SCP']);
	$Description= mysqli_real_escape_string($mysqli,$_POST['Description']);
	$Reference	= mysqli_real_escape_string($mysqli,$_POST['Reference']);
	$Addendum	= mysqli_real_escape_string($mysqli,$_POST['Addendum']);
	$History	= mysqli_real_escape_string($mysqli,$_POST['History']);
	$space		= mysqli_real_escape_string($mysqli,$_POST['space']);
	$Additional	= mysqli_real_escape_string($mysqli,$_POST['Additional']);

	

	$query = "UPDATE SCP_LIST SET Special_Containment_Procedure='$SCP',Description='$Description',Reference='$Reference',Addendum='$Addendum', Chronological_History='$History',Space_Time_Anomalies='$space',Additional_Notes='$Additional' WHERE SCP_ID='$SCP_ID' ";

	if (mysqli_query($mysqli, $query)) {	    
	    $_SESSION['msg'] = "SCP_ID [".$SCP_ID."] update Success";
	    header('location: crud.php');
	} else {
	    $_SESSION['msg'] = "Error updating SCP_ID [".$SCP_ID."].". mysqli_error($mysqli);
	    
	    header('location: crud.php');
	}

	}





?>