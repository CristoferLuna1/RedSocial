<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        $fechaNacimiento = 'fechanacimiento';
        $edad = calcularEdad($fechaNacimiento);

        if($edad < 15){
            echo 'error edad no valida';
        }



        function calcularEdad($fechaNacimiento)
     {
         $fechaNacimiento = new DateTime($fechaNacimiento);
         $hoy = new DateTime();
         $edad = $hoy->diff($fechaNacimiento)->y;
         return $edad;
         
     }
    ?>

</head>
<body>
            <div class="input-group">
                <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha-nacimiento" name="fechanacimiento" required>
            </div>
</body>
</html>