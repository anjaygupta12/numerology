<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileToUpload'])) {
    $uploadPath = __DIR__ . '/'; // Save to the same directory as upload.php
    $filename = basename($_FILES['fileToUpload']['name']);
    $targetFile = $uploadPath . $filename;

    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
        echo "File uploaded: " . htmlspecialchars($filename);
        echo "<br><a href='" . htmlspecialchars($filename) . "' target='_blank'>View File</a>";
    } else {
        echo "Error uploading file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basic File Upload</title>
</head>
<body>
    <h2>Image Upload</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
