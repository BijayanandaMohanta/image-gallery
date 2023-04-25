<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
</head>
<body>
    <h1>Gallery</h1>
    <a href="add.php">Add new image to gallery</a>
    <div class="container">
        
        <?php
            include("query.php");
            $objOpertion = new operation();

            $data = $objOpertion->displayImages();
            if($data == false){
                echo "No image uploaded yet!";
            }
            else{
                foreach($data as $image){
                    ?><img src="<?php echo $image['path'];?>" alt="" height="200">
                    <?php   
                }
            }
        ?>
        
    </div>
</body>
</html>