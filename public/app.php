


<form method="post">
	<input name='p'>
	<button type="submit">Ok</button>
</form><?php

// Creating for fast and secure way to update project


$secretKey = '1234';   
if (!isset($_POST['p']) || $_POST['p'] !== $secretKey) {
    exit('Unauthorized access.');
}

// Path to the ZIP file (one level up from this script)
$zipFile = __DIR__ . '/../arr_folders.zip';

// Destination: one level up from this script  
$extractTo = dirname(__DIR__);
  
 
$folders = ['app', 'resources', 'routes'];

// Step 1: Delete each folder if it exists (old one)
foreach ($folders as $folder) {
    $fullPath = $extractTo . '/' . $folder;
    if (is_dir($fullPath)) {
        deleteFolder($fullPath);
        echo "Found folder: $folder<br>";
    } else {
        echo "Folder not found: $folder<br>";
    }
}

// Step 2: Extract the ZIP file
$zip = new ZipArchive;

if ($zip->open($zipFile) === TRUE) {
    if ($zip->extractTo($extractTo)) {
        echo "Extraction successful into: $extractTo";
    } else {
        echo "Extraction failed.";
    }
    $zip->close();
} else {
    echo "Failed to open ZIP file.";
}

 
function deleteFolder($folder) {
    $items = array_diff(scandir($folder), ['.', '..']);
    foreach ($items as $item) {
        $path = $folder . DIRECTORY_SEPARATOR . $item;
        if (is_dir($path)) {
            deleteFolder($path);
        } else {
            unlink($path);
        }
    }
    rmdir($folder);
}
?>
