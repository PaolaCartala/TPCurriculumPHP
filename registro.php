
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=KoHo:wght@200&display=swap');
      h1 { /* resultado de la consulta */
        font-family: 'Amatic SC', cursive;
        font-size: 5vw;
        text-align: center;
      }
      h2 { /* formulario enviado correctamente */
        font-family: 'KoHo', sans-serif;
        font-size: 4vw;
        color: #064420;
      }
      h3 { /* conexion al servidor */
        font-family: 'Amatic SC', cursive;
        font-size: 2vw;
        color: #064420;
        font-weight: 500 !important;
      }
      .button { /* boton con link volver atras */
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
      }
      a {
        text-decoration: none;
        color: #000;
      }


    </style>
</head>
<body>
    <h1>Resultado de la consulta:</h1>
</body>
</html>


<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
$nombre = $_POST["nombre"] ;
$email = $_POST["correo"] ;
$mensaje = $_POST["mensaje"] ;

//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
        }
        //indicamos el nombre de la base datos
        $datab = "prueba";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido realizar la consulta";
        }
        else
        {
        echo "<h2>Formulario enviado correctamente</h2>" ;
        }
        
        $instruccion_SQL = "INSERT INTO datos (nombre, email, mensaje)
                             VALUES ('$nombre','$email','$mensaje')";
                           
        $resultado = mysqli_query($connection,$instruccion_SQL);

        
        $consulta = "SELECT * FROM datos ";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
mysqli_close( $connection );

   echo'<button class="button"><a href="index.html"> Volver Atrás</a></button>';


?>

