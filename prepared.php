<?php 
$sql = "INSERT INTO cmseffdb (title, fileupload, subtext)
VALUES (?,?,?)";

$stmt = mysqli_prepare($sql);

$stmt->bind_param("sss", $_POST['title'], $_POST['fileupload'], $_POST['subtext']);

$stmt->execute();

?>