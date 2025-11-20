<?php
// Autor: Alberto Fernandez
// Ejercicio 4: Búsqueda de películas con función pasar_a_minuscula
// Función que convierte cadena de mayúsculas a minúsculas

function pasar_a_minuscula($cadena) {
    return strtolower($cadena);
}

// Array con nombres de películas del uno al diez
$peliculas = array(
    "UNO",
    "DOS", 
    "TRES",
    "CUATRO",
    "CINCO",
    "SEIS",
    "SIETE",
    "OCHO",
    "NUEVE",
    "DIEZ"
);

// Procesar búsqueda si se envió el formulario
$resultado = "";
if (isset($_POST['buscar'])) {
    $busqueda = $_POST['busqueda'];
    $encontradas = array();
    
    foreach ($peliculas as $pelicula) {
        if (stripos($pelicula, $busqueda) !== false) {
            $encontradas[] = $pelicula;
        }
    }
    
    if (count($encontradas) > 0) {
        $resultado = "<div style='margin-top: 20px; padding: 10px; background: #d4edda; border: 1px solid #c3e6cb;'>";
        $resultado .= "<strong>Películas encontradas:</strong><br>";
        foreach ($encontradas as $pelicula) {
            // Mostrar en mayúsculas y en minúsculas usando la función
            $resultado .= "- " . $pelicula . " → " . pasar_a_minuscula($pelicula) . "<br>";
        }
        $resultado .= "</div>";
    } else {
        $resultado = "<div style='margin-top: 20px; padding: 10px; background: #f8d7da; border: 1px solid #f5c6cb;'>";
        $resultado .= "<strong>No se encontraron películas con ese criterio.</strong>";
        $resultado .= "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Películas con Conversión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"] {
            padding: 8px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 8px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Buscador de Películas con Conversión a Minúsculas</h2>
    
    <form method="POST" action="">
        <label for="busqueda">Buscar película:</label><br>
        <input type="text" name="busqueda" id="busqueda" required>
        <input type="submit" name="buscar" value="Buscar">
    </form>
    
    <?php echo $resultado; ?>
    
    <div style="margin-top: 30px; padding: 10px; background: #e9ecef;">
        <strong>Películas disponibles (Mayúsculas → Minúsculas):</strong><br>
        <?php
        foreach ($peliculas as $pelicula) {
            echo "- " . $pelicula . " → " . pasar_a_minuscula($pelicula) . "<br>";
        }
        ?>
    </div>
</body>
</html>
