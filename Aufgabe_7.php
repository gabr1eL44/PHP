<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aufgabe 7</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <label for="num1">Erste Zahl:</label><br>
        <input type="text" id="num1" name="num1"><br>

        <label for="op">Operanden:</label><br>
        <select id="op" name="op" size="0">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br>

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
            $op = $_GET["op"];

            $res = match($op) {
                "+" => $num1 + $num2,
                "-" => $num1 - $num2,
                "*" => $num1 * $num2,
                "/" => $num1 / $num2
            };
            echo $num1." ".$op." ".$num2." = ".$res;
        }
    ?>
</body>
</html>