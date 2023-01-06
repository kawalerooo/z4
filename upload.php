<?php
session_start();
$login = $_SESSION['user'];
$fileUploader = $_POST['fileUploader'];
$target_dir = $login;

if(strlen($fileUploader) > 0) {

  $target_dir = $login . "/" . $fileUploader;
}

$target_file = $target_dir . "/". basename($_FILES["fileToUpload"]["name"]);


if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
{ echo htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " uploaded."; }
else { echo "Error uploading file."; }

?>


