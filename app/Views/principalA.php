<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    el admin se la come
    <h1>Bienvenido, <?= esc($nombre) ?></h1>
    <p>Tu rol es: <?= esc($rol) ?></p>
    <p>tu id:  <?= esc($id_usuario)  ?></p>
    <p>nombre completo:  <?= esc($nombre_completo)  ?></p>
    <p>telefono:  <?= esc($telefono)  ?></p>
    <p>direccion:  <?= esc($direccion)  ?></p>

</body>
</html>