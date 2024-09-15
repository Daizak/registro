<?php
$nombreServidor = "localhost";
$username = "root";
$contrasena = "Asesino123";
$db = "login";


$conection = new mysqli( $nombreServidor,$username, $contrasena, $db);


if($conexion->connect_error){
    die("conexion fallida:" . $conexion->connect_errno);

} else{
    echo "conectado  jevi";

}

// obtener los datos del folmulario
$nombre =$_POST['usarlo'];
$pas = $_POST['password'];

// vamos a hacer la consulta en la base de datos
$sql = "SELECT * FROM login WHERE nombre = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nombre, $pas);
$stmt->execute();

$result = $stmt->get_result();

echo ($resultado);

// verificar si el usuario existe 
if ($result->num_rows > 0) {
$row = $resultado->fetch_assoc();

if (password_verify($pas,$row['password'])  ){
echo 'login exitoso';

} else {
    echo "la es incorrecta";

}

}else {
    echo 'usuario no conctado no existe';

}

//cerrar conexion

$stmt->close();
$conexionDB->close();

?>