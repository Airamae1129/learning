<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('school_year_sidebar.php'); ?>
            <div class="span3" id="adduser">
                <?php include('add_school_year.php'); ?>
            </div>
            <div class="span6" id="">
                <div class="row-fluid">
                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">School Year List</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="delete_sy.php" method="post">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <a data-toggle="modal" href="#user_delete" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
                                        <?php include('modal_delete.php'); ?>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>School Year</th>
                                                <th>Action</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user_query = mysqli_query($conn, "SELECT * FROM school_year") or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($user_query)) {
                                                $id = $row['school_year_id'];
                                            ?>
                                                <tr id="row_<?php echo $id; ?>">
                                                    <td width="30">
                                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                    </td>
                                                    <td><?php echo $row['school_year']; ?></td>
                                                    <td width="30"></td>
                                                    <td width="40">
                                                        <a href="edit_user.php?id=<?php echo $id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                                    </td>
                                                    <td width="40">
                                                        <a href="#delete_school_year_modal_<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                                    </td>
                                                </tr>
                                                
                                                <!-- Delete school year modal -->
                                                <div id="delete_school_year_modal_<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_<?php echo $id; ?>" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h3 id="myModalLabel_<?php echo $id; ?>">Delete School Year</h3>
														</div>
														<div class="modal-body">
															<p>Are you sure you want to delete the School Year "<?php echo $row['school_year']; ?>"?</p>
														</div>
														<div class="modal-footer">
															<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
															<a href="delete_sy1.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
														</div>
													</div>
												</div>
											</div>

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

