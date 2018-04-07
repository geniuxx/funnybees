<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Last  Name : <b>'.$lastname.'</b></h3>
    <h3>First Name : <b>'.$firstname.'</b></h3>
    <hr>';

    foreach ($clienti as $cliente)
    {
        echo "<a href='clienti/".$cliente["id"]."'>".$cliente["cognome"]."</a>  -  ".$cliente["nome"]."<br>";
    }

echo'
<hr>
</body>
</html>';