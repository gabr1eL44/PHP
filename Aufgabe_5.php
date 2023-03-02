<?php
    $n1 = $_GET["num1"];
    $n2 = $_GET["num2"];

    $a1 = $n1 + $n2;
    $a2 = $n1 - $n2;
    $a3 = $n1 * $n2;
    $a4 = $n1 / $n2;
    $a5 = $n1 % $n2;
    $a6 = $a1 + $a2 + $a3 + $a4 + $a5;
    echo "Addieren: ".$n1." + ".$n2." = ".$a1."<br>";
    echo "Subtrahieren: ".$n1." - ".$n2." = ".$a2."<br>";
    echo "Multiplizieren: ".$n1." * ".$n2." = ".$a3."<br>";
    echo "Dividieren: ".$n1." / ".$n2." = ".$a4."<br>";
    echo "Modulo: ".$n1." % ".$n2." = ".$a5."<br>";
    echo "Die Summe aller Egebnisse ist ".$a6."<br>";
?>