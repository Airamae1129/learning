<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('content_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <a href="add_content.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Content</a>
                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Content</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="delete_content.php" method="post">
                                    <a data-toggle="modal" href="#content_delete_modal" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
                                    <?php include('modal_delete.php'); ?>                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Title</th>
                                                <th>Action</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $content_query = mysqli_query($conn, "SELECT * FROM content") or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($content_query)) {
                                                $id = $row['content_id'];
                                            ?>
                                                <tr>
                                                    <td width="30">
                                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                    </td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td width="30"><a href="edit_content.php?id=<?php echo $id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a></td>
                                                    <td width="30">
													<a href="#delete_content_modal_<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
												</td>
												<td width="30"></td>

												<div id="delete_content_modal_<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h3 id="myModalLabel">Delete Content</h3>
													</div>
													<div class="modal-body">
														<p>Are you sure you want to delete the content "<?php echo $row['title']; ?>"?</p>
													</div>
													<div class="modal-footer">
														<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
														<a href="delete_content1.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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
            <?php include('footer.php'); ?>
        </div>
    </div>
    <?php include('script.php'); ?>
</body>
</html>
