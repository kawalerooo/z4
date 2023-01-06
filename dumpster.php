<?php
session_start();
$dataOfFiles = $_GET['data_files'];
$filename = $dataOfFiles;
$login = $_SESSION['user'];
$filename = $login . "/" . $dataOfFiles;


if (is_dir($_SESSION["user"]."/". $dataOfFiles)) {
    $files = scandir($filename);

    foreach ($files as $file) {
        if (is_file($filename . '/' . $file)) {
            unlink($filename . '/' . $file);
        }
    }
    rmdir($filename);
}else{
    if (file_exists($filename)) {
        unlink($filename);
    }
}


header('Location: index4.php');
?>


