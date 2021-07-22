<?php
	session_start();
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_employee")
	{
		save_employee();
		exit;
	}
	if($_REQUEST[act]=="delete_employee")
	{
		delete_employee();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save employee#####
	function save_employee()
	{
		$R=$_REQUEST;
		/////////////////////////////////////
		$image_name = $_FILES[employee_image][name];
		$location = $_FILES[employee_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}
		//die;
		if($R[employee_id])
		{
			$statement = "UPDATE `employee` SET";
			$cond = "WHERE `employee_id` = '$R[employee_id]'";
			$msg = "Data Updated Successfully.";
			$condQuery = "";
		}
		else
		{
			$statement = "INSERT INTO `employee` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`employee_name` = '$R[employee_name]',  
				`employee_add1` = '$R[employee_add1]', 
				`employee_add2` = '$R[employee_add2]', 
				`employee_city` = '$R[employee_city]', 
				`employee_country` = '$R[employee_country]', 
				`employee_email` = '$R[employee_email]', 
				`employee_mobile` = '$R[employee_mobile]', 
				`employee_gender` = '$R[employee_gender]', 
				`employee_dob` = '$R[employee_dob]',
				`employee_image` = '$image_name'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		if($_SESSION['login']!=1)
		{
			header("Location:../employee.php?msg=You are registered successfully.");
			exit;
		}
		header("Location:../employee-report.php?msg=$msg");
	}
#########Function for delete employee##########3
function delete_employee()
{
	$SQL="SELECT * FROM employee WHERE employee_id = $_REQUEST[employee_id]";
	$rs=mysql_query($SQL);
	$data=mysql_fetch_assoc($rs);
	
	/////////Delete the record//////////
	$SQL="DELETE FROM employee WHERE employee_id = $_REQUEST[employee_id]";
	mysql_query($SQL) or die(mysql_error());
	
	//////////Delete the image///////////
	if($data[employee_image])
	{
		unlink("../uploads/".$data[employee_image]);
	}
	header("Location:../employee-report.php?msg=Deleted Successfully.");
}
?>
