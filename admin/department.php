<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('department_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('add_department.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Department List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_department.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#department_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>Department</th>
												<th>Person In-charge</th>
												<th>Action</th>
											
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = mysqli_query($conn,"select * from department")or die(mysqli_error());
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['department_id'];
													?>
									
													<tr>
														<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
														</td>
														<td><?php echo $row['department_name']; ?></td>
														<td><?php echo $row['dean']; ?></td>
												
														<td width="30"><a href="edit_department.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a></td>
														<td width="40">
														<a href="#delete_user_modal_<?php echo htmlspecialchars($id); ?>" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
														<!-- Individual delete user modal -->
														<div id="delete_user_modal_<?php echo htmlspecialchars($id); ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_<?php echo htmlspecialchars($id); ?>" aria-hidden="true">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																<h3 id="myModalLabel_<?php echo htmlspecialchars($id); ?>">Delete Deparment</h3>
															</div>
															<div class="modal-body">
																<p>Are you sure you want to delete this Department <?php echo htmlspecialchars($row['department_name']); ?>?</p>
															</div>
															<div class="modal-footer">
																<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
																<a href="delete_department.php?id=<?php echo htmlspecialchars($id); ?>" class="btn btn-danger">Delete</a>
															</div>
														</div>
													</td>
                               
													</tr>
												<?php } ?>
										</tbody>
									</table>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>