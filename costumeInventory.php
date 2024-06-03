<?php
include('header_dashboard.php');
include('session.php');

$query = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id'");
$row = mysqli_fetch_assoc($query);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id']) && isset($_POST['item_image_url'])) {
    $student_id = $_POST['student_id'];
    $item_image_url = $_POST['item_image_url'];

    // Determine which item column to update based on the item type in the image URL
    if (strpos($item_image_url, 'hat') !== false) {
        $item_column = 'hat';
    } elseif (strpos($item_image_url, 'shirt') !== false) {
        $item_column = 'shirt';
    } elseif (strpos($item_image_url, 'pants') !== false) {
        $item_column = 'pants';
    } elseif (strpos($item_image_url, 'hand') !== false) {
        $item_column = 'hand';
    } else {
        echo "Error: Unknown item type.";
        exit;
    }

    // Update the corresponding item column with the new image URL
    $update_query = "UPDATE student SET $item_column = '$item_image_url' WHERE student_id = '$student_id'";
    $update_result = mysqli_query($conn, $update_query);

    // Check if the update was successful
    if (!$update_result) {
        echo "Error updating $item_column: " . mysqli_error($conn);
    } else {
        echo "$item_column updated successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
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
        function equipItem(studentId, imageUrl) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  
                }
            };
            var formData = "student_id=" + studentId + "&item_image_url=" + encodeURIComponent(imageUrl);
            xhr.send(formData);
location.reload();
        }
    </script>
</head>
<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('costumeInventory_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <?php
                        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Costume Inventory</b></a></li>
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
                                        <!-- Fetch and display purchased items -->
                                        <?php
                                        $purchased_query = mysqli_query($conn, "SELECT * FROM purchased_items WHERE student_id = '$session_id'");
                                        while ($purchased_row = mysqli_fetch_assoc($purchased_query)) {
                                            echo '<div class="grid-item">';
                                            echo '<img src="' . $purchased_row['item_image_url'] . '" alt="Inventory Item">';
                                            echo '<button class="equip-btn" onclick="equipItem(' . $session_id . ', \'' . $purchased_row['item_image_url'] . '\')">Equip</button>';
                                            echo '</div>';
                                        }
                                        ?>
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
