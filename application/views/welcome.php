<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        *{margin:0;padding:0;font-family:"Trebuchet MS", arial, sans-serif;box-sizing:border-box;}
        body{background-color:#069;}
        .welcome_container{
            width: 900px;
            margin: 200px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 1px 2px 3px #222;
            border-radius: 20px;
            text-align:center;
        }
        .welcome_container h1{color:#069; margin-bottom: 20px;}
        .welcome_container h3{color:#222;}
        .welcome_container p{color:#222;}
        a button{
            background-color: #069;
            border: none;
            padding: 10px;
            color: #fff;
        }
    </style>
    <title>Seja bem-vindo</title>
</head>
<body>
    <div class="welcome_container">
        <h1>Seja bem-vindo ao MINIPHPMVC</h1>
        <h3>Se você está aqui é porque deu tudo certo!</h3>
        <p>
        Parabéns e faça bom proveito, pois o MINIPHPMVC é um mini(mini mesmo) framework com um simples objetivo: 
        lhe guiar nesse mundo vasto dos frameworks, pois ele é simples e muito poderoso. 
        </p><br>
        <a href="<?php echo BASE_URL; ?>doc/"><button>Leia a documentação</button></a>
    </div>
</body>
</html>