<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('subject_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <a href="add_subject.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Subject</a>
                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><strong>Subject List</strong></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form id="delete_form" action="delete_subject.php" method="post">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <a id="delete_button" href="#" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('modal_delete.php'); ?>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Subject Code</th>
                                                <th>Subject Title</th>
                                                <th>Action</th>
												<th></th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $subject_query = mysqli_query($conn, "SELECT * FROM subject") or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($subject_query)) {
                                                $id = $row['subject_id'];
                                            ?>
                                                <tr id="subject-<?php echo $id; ?>">
                                                    <td width="30">
                                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                    </td>
                                                    <td><?php echo $row['subject_code']; ?></td>
                                                    <td><?php echo $row['subject_title']; ?></td>
                                                    <td width="30"><a href="edit_subject.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><i class="icon-pencil"></i> </a></td>
													<td width="30">
                                                        <a href="#" class="btn btn-danger delete-subject" data-id="<?php echo $id; ?>"><i class="icon-trash"></i></a>
                                                    </td>
													<td width="30"></td>
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
    <!-- Include Bootbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
        document.getElementById('delete_button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            var checkboxes = document.querySelectorAll('input[name="selector[]"]:checked');
            if (checkboxes.length > 0) {
                bootbox.confirm({
                    message: "Are you sure you want to delete the selected subjects?",
                    buttons: {
                        confirm: {
                            label: 'Delete',
                            className: 'btn-danger'
                        },
                        cancel: {
                            label: 'Cancel',
                            className: 'btn-secondary'
                        }
                    },
                    callback: function(result) {
                        if (result) {
                            document.getElementById('delete_form').submit(); // Submit the form if confirmed
                        }
                    }
                });
            } else {
                bootbox.alert({
                    message: "Please select at least one subject to delete.",
                    buttons: {
                        ok: {
                            label: 'OK',
                            className: 'btn-primary'
                        }
                    }
                });
            }
        });

        document.querySelectorAll('.delete-subject').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior
                var subjectId = this.getAttribute('data-id');
                bootbox.confirm({
                    message: "Are you sure you want to delete this subject?",
                    buttons: {
                        confirm: {
                            label: 'Delete',
                            className: 'btn-danger'
                        },
                        cancel: {
                            label: 'Cancel',
                            className: 'btn-secondary'
                        }
                    },
                    callback: function(result) {
                        if (result) {
                            // Create a form to submit the delete request
                            var form = document.createElement('form');
                            form.action = 'delete_subject.php';
                            form.method = 'POST';
                            var input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'delete_subject';
                            input.value = 'true';
                            form.appendChild(input);
                            var selector = document.createElement('input');
                            selector.type = 'hidden';
                            selector.name = 'selector[]';
                            selector.value = subjectId;
                            form.appendChild(selector);
                            document.body.appendChild(form);
                            form.submit();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
