
<?php
// Configuración
$host = "localhost";
$usuario = "root";
$password = "mipassword";
$basedatos = "tienda_web";


// Datos del formulario (sanitizados)
$nombre = trim($_POST['nombre']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$telefono = preg_replace('/[^0-9]/', '', $_POST['telefono']);


// Conexión con PDO
try {
$pdo = new PDO("mysql:host=$host;dbname=$basedatos;charset=utf8mb4",
$usuario, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
// Iniciar transacción
$pdo->beginTransaction();


// Insertar usuario
$sql = "INSERT INTO usuarios (nombre, email, fecha_registro) VALUES (:nombre,
:email, NOW())";
$stmt = $pdo->prepare($sql);
$stmt->execute([
':nombre' => $nombre, ':email' => $email
]);


$id_usuario = $pdo->lastInsertId();


// Insertar datos de contacto
$sql_contacto = "INSERT INTO contactos (id_usuario, telefono) VALUES (:id,
:telefono)";
$stmt_contacto = $pdo->prepare($sql_contacto);
$stmt_contacto->execute([ ':id' => $id_usuario,
':telefono' => $telefono
]);


// Confirmar transacción
$pdo->commit();


echo "Usuario registrado correctamente con ID: $id_usuario";


} catch(PDOException $e) {
// Revertir cambios si hay error
$pdo->rollBack();
 
echo "Error en el registro: " . $e->getMessage();
}
?>
