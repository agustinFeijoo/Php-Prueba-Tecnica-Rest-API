
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Mostrar imágenes</title>
</head>
<body>
<form action="" method="get">
    <label for="page">Ingrese el nro de la pagina para ver fotos de los usuarios:</label>
    <input type="number" name="page"/>
    <button type="submit">Submit</button>
</form>
<br/>
<?php
if(!empty($_GET['page'])){
    $contadorPersonas=0;
    $url = 'https://reqres.in/api/users' .
        '?page=' . urlencode($_GET['page']);
    $contenidoJson = file_get_contents($url);
    $json=json_decode($contenidoJson,true);



    foreach($json['data'] as $persona){
        $arrayUrlImagenes[$contadorPersonas]=$persona['avatar'];
        $contadorPersonas++;
    }
}
?>
<div id="results" data-url="<?php if (!empty($url)) echo $url ?>">
    <?php
    $idImagen=0;
    if (!empty($arrayUrlImagenes)) {
        foreach ($arrayUrlImagenes as $imagenUrl) {
            echo '<img id="imagen' . $idImagen . '" src="' . $imagenUrl . '" alt=""/><br/>';
            $idImagen++;
        }
    }
    ?>

</div>
</body>
</html>