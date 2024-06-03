 <?php
include('header_dashboard.php');
include('session.php');

$query = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id'");
$row = mysqli_fetch_assoc($query);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id']) && isset($_POST['amount'])) {
    $student_id = $_POST['student_id'];
    $amount = $_POST['amount'];

    // Check which item is being updated (hat, shirt, pants, or hand) and update the corresponding column
    if (isset($_POST['hat_image'])) {
        $item_image = $_POST['hat_image'];
        $item_column = 'hat';
    } elseif (isset($_POST['shirt_image'])) {
        $item_image = $_POST['shirt_image'];
        $item_column = 'shirt';
    } elseif (isset($_POST['pants_image'])) {
        $item_image = $_POST['pants_image'];
        $item_column = 'pants';
    } elseif (isset($_POST['hand_image'])) {
        $item_image = $_POST['hand_image'];
        $item_column = 'hand';
    }

    // Update the corresponding item column with the new image URL
    $query = "UPDATE student SET gold = gold - $amount, $item_column = '$item_image' WHERE student_id = '$student_id'";
$result = mysqli_query($conn, $query);

// Insert the image URL and student ID into the purchased_items table
$insert_query = "INSERT INTO purchased_items (student_id, item_image_url) VALUES ('$student_id', '$item_image')";
$insert_result = mysqli_query($conn, $insert_query);

if (!$result || !$insert_result) {
    echo "Error updating gold and $item_column or inserting into purchased_items table: " . mysqli_error($conn);
} else {
    echo "Gold and $item_column updated successfully, and item added to purchased_items table!";
}
}
?>


<!DOCTYPE html>
<html>
    <style>
        /* Styles for Empty Box */
        .empty-box {
            width: 33%; /* 4x8 grid, so 33.33% of the container width */
            height: 66.67vh; /* 8 parts of the 12-part vertical grid */
            background-color: #f0f0f0; /* Example background color */
            float: left;
            text-align: center; /* Center the image horizontally */
            line-height: 66.67vh; /* Center the image vertically */
            margin-bottom: 60px; /* Spacing between text boxes */
            margin-top: 30px; /* Spacing between text boxes */

        }

        /* Styles for Divs */
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-gap: 10px;
            margin-top: 20px;
        }

.gold-box {
    position: absolute;
    top: 50px; /* Adjust as needed */
    right: 100px; /* Adjust as needed */
    background-color: yellow; /* Changed to yellow */
    border: 1px solid #ccc;
    padding: 10px 20px; /* Increased padding */
    border-radius: 5px; /* Added border radius for rounded corners */
}

#current-gold {
    font-weight: bold;
    font-size: 18px; /* Increased font size */
}


       .grid-item {
            background-color: #ffffff;
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            width: 150px;
            height: 200px;
            position: relative;
        }

        .grid-item img {
            max-width: 100%;
            max-height: 100%;
		
        }

        .grid-item button {
    position: absolute;
    bottom: 10px;
    left: 30px; /* Adjust the left position */

    background-color: lightgreen;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
}

.grid-item button:nth-child(2) {
    left: calc(50% + 20px); /* Adjust the left position */
}

        .grid-container-wrapper {
    overflow-y: auto; /* Enable vertical scrolling */
    max-height: 80vh; /* Set max height */
    width: calc(100% + 300px); /* Adjust width to accommodate scrollbar */
margin-bottom: 60px; /* Spacing between text boxes */
}


.avatar-container {
    position: relative;
    width: 100%; /* Adjust as needed */
    height: 100%; /* Adjust as needed */
    overflow: hidden; /* Ensure contents don't overflow */
    display: flex;
    justify-content: center;
    align-items: center;
}

 .avatar, .hat, .shirt, .pants, .hand {
            position: absolute;
            top: 10;
            left: 0;
            width: 100%;
            height: 78%;
            background-size: contain;
            background-repeat: no-repeat;
        }
        .hat {
            background-position: center top;
        }
        .shirt {
            background-position: center center;
        }
        .pants {
            background-position: center bottom;
        }
        .hand {
            background-position: right bottom;
        }      
    </style>




<script>
    function selectHat(button, goldCost) {
    // Get the image URL from the clicked button's parent div
    var imageURL = button.parentNode.querySelector('img').src;

    // Change the background image of the hat div
    var hatDiv = document.querySelector('.hat');
    hatDiv.style.backgroundImage = "url('" + imageURL + "')";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText); // Log response for debugging
location.reload();
        }
    };

    // Update the "hat" column in the database
    xhr.send("student_id=<?php echo $session_id; ?>&amount=" + goldCost + "&hat_image=" + encodeURIComponent(imageURL));
}
</script>
<script>
    function selectShirt(button, goldCost) {
        // Get the image URL from the clicked button's parent div
        var imageURL = button.parentNode.querySelector('img').src;

        // Change the background image of the shirt div
        var shirtDiv = document.querySelector('.shirt');
        shirtDiv.style.backgroundImage = "url('" + imageURL + "')";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Log response for debugging
location.reload();
            }
        };

        // Update the "shirt" column in the database
        xhr.send("student_id=<?php echo $session_id; ?>&amount=" + goldCost + "&shirt_image=" + encodeURIComponent(imageURL));
    }
</script>






<script>
    function selectPants(button, goldCost) {
        // Get the image URL from the clicked button's parent div
        var imageURL = button.parentNode.querySelector('img').src;

        // Change the background image of the pants div
        var pantsDiv = document.querySelector('.pants');
        pantsDiv.style.backgroundImage = "url('" + imageURL + "')";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Log response for debugging
location.reload();
            }
        };

        // Update the "pants" column in the database
        xhr.send("student_id=<?php echo $session_id; ?>&amount=" + goldCost + "&pants_image=" + encodeURIComponent(imageURL));
    }
</script>

<script>
    function selectHand(button, goldCost) {
        // Get the image URL from the clicked button's parent div
        var imageURL = button.parentNode.querySelector('img').src;

        // Change the background image of the hand div
        var handDiv = document.querySelector('.hand');
        handDiv.style.backgroundImage = "url('" + imageURL + "')";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Log response for debugging
location.reload();
            }
        };

        // Update the "hand" column in the database
        xhr.send("student_id=<?php echo $session_id; ?>&amount=" + goldCost + "&hand_image=" + encodeURIComponent(imageURL));
    }



</script>


<script>
    function tryHat(button) {
        // Get the image URL from the clicked button's parent div
        var imageURL = button.parentNode.querySelector('img').src;

        // Change the background image of the hat div
        var hatDiv = document.querySelector('.hat');
        hatDiv.style.backgroundImage = "url('" + imageURL + "')";
    }

function tryShirt(button) {
    var imageURL = button.parentNode.querySelector('img').src;
    var shirtDiv = document.querySelector('.shirt');
    shirtDiv.style.backgroundImage = "url('" + imageURL + "')";
}

function tryPants(button) {
    var imageURL = button.parentNode.querySelector('img').src;
    var pantsDiv = document.querySelector('.pants');
    pantsDiv.style.backgroundImage = "url('" + imageURL + "')";
}

function tryHand(button) {
    var imageURL = button.parentNode.querySelector('img').src;
    var handDiv = document.querySelector('.hand');
    handDiv.style.backgroundImage = "url('" + imageURL + "')";
}



</script>


<body>



    <?php include('navbar_student.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('characterCustomization_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <!-- breadcrumb -->
                    <ul class="breadcrumb">


                        <?php
                        $school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Character Customization</b></a></li>
                    </ul>
                    <!-- end breadcrumb -->
<div class="gold-box">
    <span class="gold-label">Gold:</span>
    <span id="current-gold"><?php echo $row['gold']; ?></span>
</div>


                    <div class="span9" id="content">
                        <div class="row-fluid">
                            <!-- Empty Box for Images -->
                            <div class="span4 empty-box">
                                <!-- Display the image -->
                                 <div class="avatar-container">
						<img class="avatar" src="admin/images/roblox.png" alt="Avatar">

						    <div class="hat" style="background-image: url('<?php echo $row['hat']; ?>')"></div>
    <!-- Display the shirt image -->
    <div class="shirt" style="background-image: url('<?php echo $row['shirt']; ?>')"></div>
    <!-- Display the pants image -->
    <div class="pants" style="background-image: url('<?php echo $row['pants']; ?>')"></div>
    <!-- Display the hand image -->
    <div class="hand" style="background-image: url('<?php echo $row['hand']; ?>')"></div>
          
                            </div>
			</div>
                            <!-- Grid of Divs -->
                            <div class="span8">
                                <div class="grid-container-wrapper">
                                    <div class="grid-container">
                                        <!-- Manually created 20 divs -->
                                        <div class="grid-item">
                                            <img src="admin/uploads/hat1.png" alt="Image 1">
<button onclick="tryHat(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectHat(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/shirt1.png" alt="Image 2">
 <button onclick="tryShirt(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectShirt(this, 9999)" style="background-color: lightgreen;" <?php if($row['gold'] < 9999) echo 'disabled'; ?>>9999G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/pants0.png" alt="Image 3">
<button onclick="tryPants(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectPants(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/hand0.png" alt="Image 4">
<button onclick="tryHand(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectHand(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                                                                       <img src="admin/uploads/hat1.png" alt="Image 5">
<button onclick="tryHat(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectHat(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/shirt0.png" alt="Image 6">
 <button onclick="tryShirt(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectShirt(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/pants1.png" alt="Image 7">
<button onclick="tryPants(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectPants(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/hand1.png" alt="Image 8">
<button onclick="tryHand(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectHand(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/hat0.png" alt="Image 9">
<button onclick="tryHat(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectHat(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
<img src="admin/uploads/shirt1.png" alt="Image 10">
 <button onclick="tryShirt(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectShirt(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/pants1.png" alt="Image 11">
<button onclick="tryPants(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectPants(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/hand1.png" alt="Image 12">
<button onclick="tryHand(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectHand(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/hat1.png" alt="Image 13">
<button onclick="tryHat(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectHat(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                           <img src="admin/uploads/shirt1.png" alt="Image 14">
 <button onclick="tryShirt(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectShirt(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/pants1.png" alt="Image 15">
<button onclick="tryPants(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectPants(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/hand1.png" alt="Image 16">
<button onclick="tryHand(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectHand(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/hat1.png" alt="Image 17">
<button onclick="tryHat(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectHat(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/shirt1.png" alt="Image 18">
 <button onclick="tryShirt(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectShirt(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
                                        <div class="grid-item">
                                            <img src="admin/uploads/pants1.png" alt="Image 19">
<button onclick="tryPants(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectPants(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
                                        </div>
<div class="grid-item">
    <img src="admin/uploads/hand1.png" alt="Image 20">
<button onclick="tryHand(this)" style="background-color: lightblue;">Try</button>
                                            <button onclick="selectHand(this, 100)" style="background-color: lightgreen;" <?php if($row['gold'] < 100) echo 'disabled'; ?>>100G</button>
</div>
  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <?php include('script.php'); ?>
</body>
</html>