<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>
    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('class_sidebar.php'); ?>
            <div class="span3" id="adduser">
                <?php include('add_class.php'); ?>                   
            </div>
            <div class="span6" id="">
                <div class="row-fluid">
                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><strong>Course and Section List</strong></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form id="delete_form" action="delete_class.php" method="post">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <a id="delete_button" href="#" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('modal_delete.php'); ?>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Course Year And Section</th>
                                                <th>Action</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $class_query = mysqli_query($conn, "SELECT * FROM class") or die(mysqli_error($conn));
                                            while ($class_row = mysqli_fetch_array($class_query)) {
                                                $id = $class_row['class_id'];
                                            ?>
                                                <tr id="class-<?php echo $id; ?>">
                                                    <td width="30">
                                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                    </td>
                                                    <td><?php echo $class_row['class_name']; ?></td>
                                                    <td width="40"><a href="edit_class.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                                                    <td width="30">
                                                        <a href="#" class="btn btn-danger delete-class" data-id="<?php echo $id; ?>"><i class="icon-trash"></i></a>
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
    <!-- Include Bootbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
        document.getElementById('delete_button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            var checkboxes = document.querySelectorAll('input[name="selector[]"]:checked');
            if (checkboxes.length > 0) {
                bootbox.confirm({
                    message: "Are you sure you want to delete the selected classes?",
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
                    message: "Please select at least one class to delete.",
                    buttons: {
                        ok: {
                            label: 'OK',
                            className: 'btn-primary'
                        }
                    }
                });
            }
        });

        document.querySelectorAll('.delete-class').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior
                var classId = this.getAttribute('data-id');
                bootbox.confirm({
                    message: "Are you sure you want to delete this class?",
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
                            form.action = 'delete_class.php';
                            form.method = 'POST';
                            var input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'delete_class';
                            input.value = 'true';
                            form.appendChild(input);
                            var selector = document.createElement('input');
                            selector.type = 'hidden';
                            selector.name = 'selector[]';
                            selector.value = classId;
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
