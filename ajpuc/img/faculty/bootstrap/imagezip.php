<?php
if(isset($_POST["fname"]))
{
$rootPath = $_POST["pathn"];
$fname=$_POST["fname"];

// Initialize archive object
$zip = new ZipArchive();
$zip->open($fname.date("d").date("m").date("y"), ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();
} 
?>


<form method="POST">
    Path:<input type="text" name="pathn" required>
    FileName<input type="text" name="fname" required>
    
    <input type="submit">
</form>