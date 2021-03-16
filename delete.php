<?
include("config.php");
$id = $_GET["id"];
$delete = mysqli_query($mysql, "DELETE FROM alterra WHERE id = $id");
header("Location: index.php");