<?php
include 'db.php';


function redirectToForm($message = null) {
    if ($message) {
        echo "<p>$message</p>";
    }
    echo '<a href="form.php"><button>Go Back to Form</button></a>';
    exit; 
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$title = $_POST['title'];
$body = $_POST['body'];
$published = isset($_POST['published']) ? 1 : 0;
$created_at = date('Y-m-d H:i:s');


$sql = "SELECT id FROM users WHERE firstName = ? AND lastName = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $firstName, $lastName);
$stmt->execute();
$stmt->bind_result($user_id);
$stmt->fetch();
$stmt->close();

if (!$user_id) {
    redirectToForm("User not found. Ensure that the user exists in the database.");
}


$image = null;
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = 'uploads/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $image);
} else {
    
    redirectToForm("Please upload an image.");
}


$sql = "INSERT INTO postsdeewhy (user_id, title, image, body, published, created_at) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssis", $user_id, $title, $image, $body, $published, $created_at);

if ($stmt->execute()) {
    echo "New record created successfully<br>";
    echo '<a href="form.php"><button>Go Back to Form</button></a>'; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    redirectToForm(); 
}

$stmt->close();
$conn->close();
?>
