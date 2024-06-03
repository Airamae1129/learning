<?php
include('admin/dbcon.php');
include('session.php');
if (isset($_POST['read'])){
if(isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);
    // Proceed with further processing
} else {
    // Handle the case where no checkboxes were checked
    echo "No checkboxes were checked.";
    // You can redirect the user, display a message, or take any appropriate action.
}for($i=0; $i < $N; $i++)
{

	mysqli_query($conn,"insert into notification_read (student_id,student_read,notification_id) values('$session_id','yes','$id[$i]')")or die(mysqli_error());
	
	
	
}
?>
<script>
window.location = 'student_notification.php';
</script>
<?php
}
?>