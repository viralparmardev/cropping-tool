<?php

$target = "uploads/";
$image=($_FILES['image']['name']); 

$tmp=$_FILES["image"]["tmp_name"];
$extension = explode("/", $_FILES["image"]["type"]);

if(move_uploaded_file($tmp, "uploads/" ."OLD".".".$extension[1])) {
    
} else {  
    echo "Sorry, there was a problem uploading your file."; 
}

if($extension[1]=='png') {
    $src = imagecreatefrompng('uploads/OLD.'.$extension[1]);
}
else if($extension[1]=='jpeg') {
    $src = imagecreatefromjpeg('uploads/OLD.'.$extension[1]);
}

$dest = imagecreatetruecolor(755, 450);
imagecopy(
    $dest, 
    $src, 
    0,    // 0x of your destination
    0,    // 0y of your destination
    135,   // middle x of your source 
    287,   // middle y of your source
    755,  // 30px of width
    450   // 20px of height
);
imagepng($dest, 'uploads/horizontal.'.$extension[1]);
imagedestroy($dest);

$dest = imagecreatetruecolor(365, 450);
imagecopy(
    $dest, 
    $src, 
    0,    // 0x of your destination
    0,    // 0y of your destination
    329,   // middle x of your source 
    287,   // middle y of your source
    365,  // 30px of width
    450   // 20px of height
);

imagepng($dest, 'uploads/vertical.'.$extension[1]);
imagedestroy($dest);

$dest = imagecreatetruecolor(365, 212);
imagecopy(
    $dest, 
    $src, 
    0,    // 0x of your destination
    0,    // 0y of your destination
    329,   // middle x of your source 
    406,   // middle y of your source
    365,  // 30px of width
    212   // 20px of height
);

imagepng($dest, 'uploads/horizontal-small.'.$extension[1]);
imagedestroy($dest);

$dest = imagecreatetruecolor(380, 380);
imagecopy(
    $dest, 
    $src, 
    0,    // 0x of your destination
    0,    // 0y of your destination
    322,   // middle x of your source 
    322,   // middle y of your source
    380,  // 30px of width
    380   // 20px of height
);
imagepng($dest, 'uploads/gallery.'.$extension[1]);
imagedestroy($dest);

imagedestroy($src);

if($extension[1]=='png') {

    echo <<<EXCERPT

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CropThat!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />

</head>

<body>
    <div class="text-light bg-danger text-center">
        <br>
        <h1><a href="index.html" class="text-light">CropThat!</a></h1>
        <p>The best free service to crop images online</p>
        <br>
    </div>
    <div class="container text-center">
        <br>
        <div class="row">
            <div class="col-md-3"><br>
                <p>Horizontal<br>755 x 450</p>
                <img src="uploads/horizontal.png" width="100%"><br><br>
                <a href="uploads/horizontal.png" class="btn btn-danger" role="button">Download in full size</a>
            </div>
            <div class="col-md-3"><br>
                <p>Vertical<br>365 x 450</p>
                <img src="uploads/vertical.png" width="100%"><br><br>
                <a href="uploads/vertical.png" class="btn btn-danger" role="button">Download in full size</a>
            </div>
            <div class="col-md-3"><br>
                <p>Horizontal Small<br>365 x 212</p>
                <img src="uploads/horizontal-small.png" width="100%"><br><br>
                <a href="uploads/horizontal-small.png" class="btn btn-danger" role="button">Download in full size</a>
            </div>
            <div class="col-md-3"><br>
                <p>Gallery<br>380 x 380</p>
                <img src="uploads/gallery.png" width="100%"><br><br>
                <a href="uploads/gallery.png" class="btn btn-danger" role="button">Download in full size</a>
            </div>
        </div>
        
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>

EXCERPT;

}
else if($extension[1]=='jpeg') {

    echo <<<EXCERPT

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CropThat!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />

</head>

<body>
    <div class="text-light bg-danger text-center">
        <br>
        <h1><a href="index.html" class="text-light">CropThat!</a></h1>
        <p>The best free service to crop images online</p>
        <br>
    </div>
    <div class="container text-center">
        <br>
        <div class="row">
            <div class="col-md-3"><br>
                <p>Horizontal<br>755 x 450</p>
                <img src="uploads/horizontal.jpeg" width="100%"><br><br>
                <a href="uploads/horizontal.jpeg" class="btn btn-danger" role="button">Download in full size</a>
            </div>
            <div class="col-md-3"><br>
                <p>Vertical<br>365 x 450</p>
                <img src="uploads/vertical.jpeg" width="100%"><br><br>
                <a href="uploads/vertical.jpeg" class="btn btn-danger" role="button">Download in full size</a>
            </div>
            <div class="col-md-3"><br>
                <p>Horizontal Small<br>365 x 212</p>
                <img src="uploads/horizontal-small.jpeg" width="100%"><br><br>
                <a href="uploads/horizontal-small.jpeg" class="btn btn-danger" role="button">Download in full size</a>
            </div>
            <div class="col-md-3"><br>
                <p>Gallery<br>380 x 380</p>
                <img src="uploads/gallery.jpeg" width="100%"><br><br>
                <a href="uploads/gallery.jpeg" class="btn btn-danger" role="button">Download in full size</a>
            </div>
        </div>
        
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>

EXCERPT;

}
else {

    echo <<< EXCERPT

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CropThat!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />

</head>

<body>
    <div class="text-light bg-danger text-center">
        <br>
        <h1><a href="index.html" class="text-light">Server error!</a></h1>
        <p>We're facing technical difficulties at the moment.
        <br>
        Please try uploading another image or check back again later.
        </p>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>

EXCERPT;

}

echo <<<EXCERPT

<div class="text-muted text-center">
<br><br><br>
<p>Created by <a href="https://viralparmar.ml" class="text-danger">Viral Parmar</a> as a coding exercise for <a href="https://insider.in" class="text-danger">Insider</a></p>
<br>
</div>

EXCERPT;

?>