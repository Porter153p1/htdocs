<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
      $numero = 20;
      $palabra = "hola";
      print_r(get_defined_vars());

      $meses[] = 12.5;
      $meses[] = 24.2;
      $meses[] = 2.1;
      $meses[] = 30.4;
      echo "<br>$meses[0]<br>";
      print_r($meses);
    ?>
  </body>
</html>
