<?php

    include("query.php");

    $objOpertion = new operation();
    if(isset($_POST['submit'])){
        $file = $_FILES['image'];
        $objOpertion->saveImage($file);
        if($objOpertion){
            header("location:index.php");
        }
        else{
            echo "Uploading failed";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new image</title>
    <style>
        .container{
            position: absolute;
            left: 50%;
            top:50%;
            transform: translate(-50%,-50%);
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="add.php" method="post" enctype="multipart/form-data">
        Click to upload and img :
        <input type="file" name="image" id="">
        <input type="submit" value="Upload" name="submit">
        </form>
    </div>
</body>
</html>