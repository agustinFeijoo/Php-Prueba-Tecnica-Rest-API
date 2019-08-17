<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Contador de letras</title>
</head>
<body>
<?php 
$contadorPersonas=0;
$mayorA12caracteres=0;
for($i=0;$i<4;$i++){
    $url = 'https://reqres.in/api/users?page='.$i;
    $contenidoJson = file_get_contents($url);
    $json= json_decode($contenidoJson, true);
    foreach($json['data'] as $persona){
        echo $persona['first_name'].' '.$persona['last_name'] //muestra nombre y apellido
        .strlen($persona['last_name'].$persona['first_name']).'<br/>'; //muestra cantidad de caracteres
        $contadorPersonas++;
        if(strlen($persona['last_name'].$persona['first_name'])>12)
            $mayorA12caracteres++;
    }
}
    $porcentajeMayorA12=($mayorA12caracteres/$contadorPersonas)*100;
echo 'El porcentaje de personas cuyo nombre y apellido tienen mas de 12 caracteres es de '.$porcentajeMayorA12.'%';
?>

</body>
</html>