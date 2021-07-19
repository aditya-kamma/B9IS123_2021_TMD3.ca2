<?php 
	
?>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Employee Reports</h4>
			<form name="frm_employee" action="lib/employee.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Name</td>
						<td scope="col">Mobile</td>
						<td scope="col">Email</td>
						<td scope="col">Date Of Birth</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><?=$data[employee_name]?></td>
						<td><?=$data[employee_mobile]?></td>
						<td><?=$data[employee_email]?></td>
						<td><?=$data[employee_dob]?></td>
						<td style="text-align:center"><a href="employee.php?employee_id=<?php echo $data[employee_id] ?>">Edit</a> | <a href="Javascript:delete_employee(<?=$data[employee_id]?>)">Delete</a> </td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="employee_id" />
			</form>
		</div>
		</div>
	</div>
< ?> 
