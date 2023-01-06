<!DOCTYPE html>
<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
<?php
    $fileUploader = $_GET['data_files'];
    echo '<input type="hidden" name="fileUploader" value="'. $fileUploader .'">';

?>
</form>
</body>
</html>

