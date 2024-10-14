<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio1</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    
    <?php
        
    $ancho = 0;
    $largo = 0;
    $alto = 0;
    $precio = 0;
    $peso = 0;
    $zona = 0; // 1 Baleares 2 Canarias
    $transporte = 0; // 1 Maritimo 2 Aereo
    $volumen = $ancho * $largo * $alto;
    $nroPaquetes = 0; //Se multiplica al final

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["nroPaquetes"])) {
            $nroPaquetes = $_POST["nroPaquetes"];
        } else {
            $nroPaquetes = 1; 
        }
        $ancho = $_POST["ancho"];
        $largo = $_POST["largo"];
        $alto = $_POST["alto"];
        $peso = $_POST["peso"];
        $zona = $_POST["zona"];

        $volumen = $ancho * $largo * $alto;     

        if ($zona == 1){
            $transporte = rand(1,2);
        }
        if ($volumen <= 0.5){
            $precio = 50 * $volumen;
        }
        elseif ($volumen <= 1){
            $precio = 75 * $volumen;
        }
        elseif ($volumen > 1){
            $precio = 100 * $volumen;
        }

    

        
        if ($peso > 15){
            echo "Su paquete no puede ser enviado.";
        }
        elseif ($peso >= 10) {
            $precio *= 1.5;
        }
        elseif ($peso >= 5) {
            $precio *= 1.25;
        }
    

        if ($zona == 1 && $transporte == 2){
            $precio *= 1.1;
        }
        elseif ($zona == 2){
            $precio *= 1.1;
        }
    

        $precio *= $nroPaquetes; 

        echo "Precio: " . $precio;
    
    }
    ?>

    <form action="" method = "post">
    <label for="nroPaquetes">Numero de paquetes:</label>
    <input type="number" name="nroPaquetes" id="nroPaquetes"><br>
    <label for="ancho">Ancho:</label>
    <input type="number" name="ancho" step="0.01" id="ancho"><br>
    <label for="largo">Largo:</label>
    <input type="number" name="largo" step="0.01" id="largo"><br>
    <label for="alto">Alto:</label>
    <input type="number" name="alto" step="0.01" id="alto"><br>
    <label for="peso">Peso:</label>
    <input type="number" name="peso" step="0.01" id="peso"><br>
    <label for="zona">Zona (0 Peninsula 1 Baleares 2 Canarias) </label>
    <input type="number" name="zona" step="0.01" id="zona"><br>
    <input type="submit" value="Enviar">
    </form>

</body>
</html>