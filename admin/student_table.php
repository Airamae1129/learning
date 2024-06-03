	<?php include('dbcon.php'); ?>
	<form action="delete_student.php" method="post">
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
	<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name="">Delete Users <i class="icon-trash icon-large"></i></a>
	<?php include('modal_delete.php'); ?>
		<thead>
		<tr>
		<th></th>
                                            <th>Name</th>
                                            <th>Username</th>
											<th>Course</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th></th>
		</tr>
		</thead>
		<tbody>
			
		<?php
	$query = mysqli_query($conn,"select * from student LEFT JOIN class ON student.class_id = class.class_id ORDER BY student.student_id DESC") or die(mysqli_error());
	while ($row = mysqli_fetch_array($query)) {
		$id = $row['student_id'];
		?>
	
		<tr>
		<td width="30">
		<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
		</td>
		<td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
		<td><?php echo $row['username']; ?></td> 
		<td width="100"><?php echo $row['class_name']; ?></td> 
		<td width="30">
        <a data-toggle="modal" class="btn btn-success" readonly="">Active</a>
	</td>
	
		<td width="30"><a href="edit_student.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
		<td width="40">
    <a href="#delete_user_modal_<?php echo htmlspecialchars($id); ?>" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
    <!-- Individual delete user modal -->
    <div id="delete_user_modal_<?php echo htmlspecialchars($id); ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_<?php echo htmlspecialchars($id); ?>" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel_<?php echo htmlspecialchars($id); ?>">Delete Student</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete the student <?php echo htmlspecialchars($row['firstname']) . ' ' . htmlspecialchars($row['lastname']); ?>?</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <a href="delete_student.php?id=<?php echo htmlspecialchars($id); ?>" class="btn btn-danger">Delete</a>
        </div>
    </div>
</td>


	
		</tr>
	
	<?php } ?>    
	
		</tbody>
	</table>
	</form>