<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aufgabe 8</title>
</head>
<body>
    <h1>Kleinstes Gemeinsames Vielfaches</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <label for="num1">Erste Zahl:</label><br>
        <input type="text" id="num1" name="num1"><br>
        <label for="num2">Zweite Zahl:</label><br>
        <input type="text" id="num2" name="num2"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if ((!empty($_GET["num1"])) AND (!empty($num2 = $_GET["num2"])) AND is_numeric($_GET["num1"]) AND is_numeric($_GET["num2"]))
        {
            $num1 = $_GET["num1"];
            $num2 = $_GET["num2"];

            for ($var = 1; $var <= $num1 * $num2; $var++)
            {
                if (($var % $num1 == 0) AND ($var % $num2 == 0))
                {
                    $res = $var;
                    break;
                }
            }
            $res1 = $res / $num1;
            $res2 = $res / $num2;
            echo "Das kleinste gemeinsame Vielfache von ".$num1." und ".$num2." ist ".$res.".<br><br>";
            echo "Dabei wird ".$num1." x ".$res1." und ".$num2." x ".$res2." genommen.";
        }
    ?>
</body>
</html>