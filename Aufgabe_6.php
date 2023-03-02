<?php
    $num = $_GET["num"];
    $range = ($num < 10) ? "ist kleiner als 10." : (($num > 100) ? "ist größer als 100." : "liegt zwischen 10 und 100.");
    $parity = ($num % 2 == 0) ? "gerade." : "ungerade.";

    echo "Die Zahl ".$range."<br>";
    echo "Sie ist außerdem ".$parity;
?>