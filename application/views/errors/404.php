<!DOCTYPE html>
<html lang="<?php echo APP_LANG; ?>">
<head>
    <meta charset="<?php echo APP_CHARSET;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404</title>
    <style>
        body{background-color:#f4f4f4; font-family: "Helvetica", arial, sans-serif;}
        .container{width:600px;margin: 150px auto;}
        .error-box{text-align:center;}
        .error-box h1{color:#222;}
    </style>
</head>
<body>
    <div class="container">
        <div class="error-box">
            <h1>Error 404 :(</h1>
            <p>This page "<?php echo $error;?>" can't be loaded, because does not exists!</p>
        </div>
    </div>
</body>
</html>