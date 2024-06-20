<?php
session_start();
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\Surfconnect\stylepost.css" />
    <title>About</title>
   
  </head>
  <body>
    <nav>
      
        <a href="\Surfconnect\index.html"><div class="logo">Surf Connect</div></a>
      <div class="nav-items">
        <a href="\Surfconnect\index.html">Home</a> <a href="\Surfconnect\about.html">About</a> <a href="\Surfconnect\contact.html">Contact</a>
      </div>
    </nav>


<body>
    <h1>Share Your Experience with Freshwater!</h1>
    <form id="submit-form" action="submit_post.php" method="POST" enctype="multipart/form-data">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*"><br>

        <label for="body">Body:</label>
        <textarea id="body" name="body" rows="10" cols="30" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

</html>

</html>


<?php
include 'db.php';


$sql = "SELECT postsfreshwater.*, users.firstName, users.lastName 
        FROM postsfreshwater 
        JOIN users ON postsfreshwater.user_id = users.id 
        ORDER BY postsfreshwater.created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
</head>
<body>
    <h1>Blog Posts</h1>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
            if ($row['image']) {
                echo "<img src='" . htmlspecialchars($row['image']) . "' alt='Blog Image' width='200'>";
            }
            echo "<p>" . nl2br(htmlspecialchars($row['body'])) . "</p>";
            echo "<small>Published on: " . $row['created_at'] . "</small><br>";
            
            echo "<small>Author: " . htmlspecialchars($row['firstName']) . " " . htmlspecialchars($row['lastName']) . "</small>";
            echo "</div><hr>";
        }
    } else {
        echo "No posts found.";
    }
    ?>
</body>
</html>

<?php
$conn->close();
?>
