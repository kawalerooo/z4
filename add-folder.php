<?php
session_start();

mkdir($_SESSION["user"] . "/" . $_POST["folderName"]);
echo $_SESSION["user"] . "/" . $_POST["folderName"];
header("Location index4.php");

