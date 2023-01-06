<?php declare(strict_types=1);
session_start();
if (!isset($_SESSION['loggedin']))
{
    header('Location: logowanie.php');
    exit();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<BODY>
<a href = "addDirectory.php"  <i class="fa fa-folder"></i></a> Dodaj katalog
<br>
<br>
<a href = "select.php"  <i class="fa fa-upload"></i></a> Wyślij plik
<br>
<br>
<?php
$files = scandir($_SESSION["user"]);

echo "<table border='1'>";
echo "<tr>";
echo "<th>Podgląd</th>";
echo "<th>Nazwa pliku</th>";
echo "<th>Opcje</th>";
echo "</tr>";
foreach ($files as $file) {
    if ($file != "." && $file != "..") {

        if (is_dir($_SESSION["user"]."/". $file)) {
            echo "<tr>";
            echo "<td>" .  "</td>";
            echo "<td><a href='showDirectory.php?data_files=" . $file . "'> " . $file . "</a></td>";
            echo "<td>" .'<a href = "dumpster.php?data_files=' . $file .'"> <i class="fa fa-trash"></i></a>' . "</td>";
            echo "</tr>";
        }else {
            echo "<tr>";
            echo "<td>";
            $message = "";
            $path =$_SESSION["user"]."/". $file;

            if (strpos($path, '.jpg')) {
                $message = "<img src ='$path'>";
            } else if (strpos($path, '.png')) {
                $message = "<img src ='$path'>";
            } else if (strpos($path, '.gif')) {
                $message = "<img src ='$path'>";
            } else if (strpos($path, '.mp3')) {
                $message = "<audio controls src ='$path'> </audio>";
            } else if (strpos($path, '.mp4')) {
                $message = "<video controls width='250' autoplay='true' muted='true'> <source src=''$path'></video>";
            }
            echo $message;
            echo "</td>";
            echo "<td><a download href='" . $_SESSION["user"] . '/' .$file . "'> " . $file . "</a></td>";
            echo "<td>" .'<a href = "dumpster.php?data_files=' . $file .'"> <i class="fa fa-trash"></i></a>' . "</td>";
            echo "</tr>";
        }
    }
}
echo "</table>";


?>
<font color="#FF0101"><h2 align='center'><a href="logout.php">WYLOGUJ</a></h2><font color="#FF0101">
</BODY>
</HTML>