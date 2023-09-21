<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Insertando registros avl lab</title>
</head>
<body>
    <h1>Eliminar en cat_Estatus</h1>
    <form name="estatusID" method="get" action="eliminarRegistros.php">
        <table border="0" align="center">
            <tr>
                <td>ID del estatus</td>
                <td><label for="estatusID"></label>
                <input type="text" name="estatusID" id="estatusID"></td>
            </tr>
            <tr>
                <td>Nombre del estado</td>
                <td><label for="estatusName"></label>
                    <input type="text" name="estatusName" id="estatusName"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center"><input type="submit" name="enviar" id="enviar" value="Eliminar !!!"></td>
                <td align="center"><input type="reset" name="limpiar" id="limpiar"></td>
            </tr>
        </table>
    </form>

</body>
</html>