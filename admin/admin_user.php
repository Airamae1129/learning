<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('admin_sidebar.php'); ?>
            <div class="span3" id="adduser">
                <?php include('add_user.php'); ?>
            </div>
            <div class="span6" id="">
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left"><strong>Admin List</strong></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="delete_users.php" method="post">
                                <a data-toggle="modal" href="#user_delete_modal" id="delete" class="btn btn-danger" name="">Delete Users <i class="icon-trash icon-small"></i></a>
                                <!-- Modal -->
                                <div id="user_delete_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel">Delete Users</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete the selected users?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user_query = mysqli_query($conn, "SELECT * FROM users") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($user_query)) {
                                            $id = $row['user_id'];
                                        ?>
                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td width="30">
                                                    <a data-toggle="modal" class="btn btn-success" readonly="">Active</a>
                                                </td>
                                                <td width="40">
                                                    <a href="edit_user1.php?id=<?php echo $id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                                </td>
                                                <td width="40">
                                                    <a href="#delete_user_modal_<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                                    <!-- Individual delete user modal -->
                                                    <div id="delete_user_modal_<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h3 id="myModalLabel">Delete Admin Account</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete the user <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                            <a href="delete_user.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>
</html>
