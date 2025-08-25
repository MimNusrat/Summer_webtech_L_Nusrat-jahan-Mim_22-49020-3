<?php
// Get form values safely
$name    = $_POST["name"] ?? "";
$email   = $_POST["email"] ?? "";
$website = $_POST["website"] ?? "";
$phone   = $_POST["phone"] ?? "";
$gender  = $_POST["gender"] ?? "";

// Collect errors
$errors = [];

// Check required fields
if ($name == "")    $errors[] = "Name is required";
if ($email == "")   $errors[] = "Email is required";
if ($website == "") $errors[] = "Website is required";
if ($phone == "")   $errors[] = "Phone is required";
if ($gender == "")  $errors[] = "Gender is required";

// Validate formats
if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format";
if ($website && !filter_var($website, FILTER_VALIDATE_URL)) $errors[] = "Invalid website URL";
if ($phone && !preg_match("/^[0-9]{10,15}$/", $phone)) $errors[] = "Phone must be 10–15 digits only";

// Handle image upload
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $file_type = $_FILES['image']['type'];
    $file_size = $_FILES['image']['size'];
    
 if (!in_array($file_type, $allowed_types)) {
        $errors[] = "Only JPG, PNG, and GIF files are allowed";
    }
    if ($file_size > 2 * 1024 * 1024) { // 2MB limit
        $errors[] = "Image size must be less than 2MB";
    }

    if (!$errors) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        $target_file = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    }
} else {
    $errors[] = "Image is required";
}

// Show result
if ($errors) {
    echo "<h3>Errors Found:</h3><ul>";
    foreach ($errors as $e) echo "<li>$e</li>";
    echo "</ul><a href='index.html'>Go back</a>";
} else {
    echo "<h3>Form Submitted Successfully!</h3>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Website: $website <br>";
    echo "Phone: $phone <br>";
    echo "Gender: $gender <br>";
    echo "Uploaded Image: <br><img src='$target_file' width='200'>";
}
?>