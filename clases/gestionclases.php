<?php
    include "misclases.php";

    echo "<br><br><br><br><br><br><br><br>";

    $user4=new Persona("Pepito", 42);

    echo $user4->nombre;

    $user5=$user4;

    echo "<br>El usuario 5 es: ". $user5->nombre;

    $user4->nombre="Juan";

    echo "<br>El usuario 5 es: ". $user5->nombre;

    $user6= clone $user4;

    echo "<br>El usuario 6 es: ". $user6->nombre;

    $user4->nombre="Alterado";

    echo "<br>El usuario 6 es: ". $user6->nombre;

    $user5->nombre="Alterado";

    echo "<br>El usuario 4 es: ". $user4->nombre;
?>