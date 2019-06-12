
<form  id="form" method="post" action="index.php" enctype="multipart/form-data" > 
<h1>Загрузить картинку:</h1>
<input type="file" id="file" name="file" />
 <input type="submit"  value="submit" class="btn btn-success"> 
</form>
<?php
if($_FILES['file']['type'] === 'image/jpeg' || $_FILES['file']['type'] === 'image/png' || $_FILES['file']['type'] === 'image/gif'){ 
    $tmp = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $path = "images/".$name;
    move_uploaded_file($tmp, $path);
    echo "<img src='$path' alt='$name' />";
} else {
    echo "wrong formate";
}
?>
