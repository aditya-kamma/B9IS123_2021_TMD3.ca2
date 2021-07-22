<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_salary")
	{
		save_salary();
		exit;
	}
	if($_REQUEST[act]=="delete_salary")
	{
		delete_salary();
		exit;
	}
	if($_REQUEST[act]=="update_salary_status")
	{
		update_salary_status();
		exit;
	}
	
	###Code for save salary#####
	function save_salary()
	{
		$R=$_REQUEST;						
		if($R[salary_id])
		{
			$statement = "UPDATE `salary` SET";
			$cond = "WHERE `salary_id` = '$R[salary_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `salary` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`salary_employee_id` = '$R[salary_employee_id]', 
				`salary_month` = '$R[salary_month]', 
				`salary_year` = '$R[salary_year]', 
				`salary_amount` = '$R[salary_amount]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../salary-report.php?msg=$msg");
	}
#########Function for delete salary##########3
function delete_salary()
{	
	/////////Delete the record//////////
	$SQL="DELETE FROM salary WHERE salary_id = $_REQUEST[salary_id]";
	mysql_query($SQL) or die(mysql_error());
	header("Location:../salary-report.php?msg=Deleted Successfully.");
}
?>
