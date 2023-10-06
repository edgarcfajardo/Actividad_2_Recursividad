<?php

#=====================================================
# Equipo:
# *Cruz Fajardo Edgar Alejandro
# *Garcia Lopez Cesar Misael
# *Sanchez Martinez Diego
# *Baez Chavoya Erick
# *Morales Alta Mauro
#=====================================================

function encontrarMultiplos($numero, $lista, $i = 0, $multiplos = array()) {
    if ($i == count($lista)) {
        return $multiplos;
    }

    $numeroActual = $lista[$i];

    if ($numeroActual % $numero == 0) {
        $multiplos[] = $numeroActual;
    }

    return encontrarMultiplos($numero, $lista, $i + 1, $multiplos);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $listaNumeros = explode(',', $_POST['numeros']);
    $numeroBuscado = $_POST['numero'];
    // Convertir lista a números enteros
    $listaNumeros = array_map('intval', $listaNumeros);
    // Buscar los múltiplos
    $resultado = encontrarMultiplos($numeroBuscado, $listaNumeros);
}
?>

<!DOCTYPE html>
<!-- Formulario -->
<html>
<head>
    <title>Buscar Múltiplos</title>
</head>
<body style="padding: 30px;">
    <h1>Buscar múltiplos de un número :D</h1>
    <form method="POST" action="">
        <label for="numeros">Ingresa una lista de números separados por comas (ejemplo: 1,2,3,4):</label>
        <br>
        <input type="text" name="numeros" id="numeros" required>
        <br>
        <br>
        <label for="numero">Ingrese el número al que desea buscar sus múltiplos:</label>
        <br>
        <input type="number" name="numero" id="numero" required>
        <br>
        <br>
        <input style="border-radius: 20px; background-color: black; color: white;
        padding: 10px" type="submit" value="Buscar múltiplos">
    </form>

    <?php
    // Lista proporcionada
    if (isset($listaNumeros)) {
        echo "<h2>Lista Original</h2>";
        echo implode(", ", $listaNumeros);
    }

    // Resultado
    if (isset($resultado)) {
        if (count($resultado) > 0) {
            echo "<h2>Múltiplos de $numeroBuscado</h2>";
            echo implode(", ", $resultado);
        } else {
            echo "<p>No se encontro ningún múltiplo de $numeroBuscado.</p>";
        }
    }
    ?>
</body>
</html>
