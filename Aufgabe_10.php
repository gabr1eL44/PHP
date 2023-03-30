<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aufgabe 10</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <label for="value1"></label>Erster Wert:<br>
        <input type="input" name="value1"><br><br>
        <label for="value2"></label>Zweiter Wert:<br>
        <input type="input" name="value2"><br>
        <input type="submit" value="Bestätigen">
        <?php
            $Add = function($sum1, $sum2) {
                return $sum1 + $sum2;
            };
            $Divide = function($div1, $div2) {
                return $div1 / $div2;
            };
        ?>
        <?php
            if (isset($_GET['value1']) && isset($_GET['value1'])) {
                $a = $_GET['value1'];
                $b = $_GET['value2'];

                for ($x = 0; $x < 1; $x++) {
                    $res = $Add($a, $b);
                    $res *= 2;
                    $res -= $b;
                    $res -= $Divide($a, $b);
                    $res += 3*$a;
                    $a = $res;
                }
                echo "<p>".$res."</p>";   
            }
        ?>
    </form>
    <br>
</body>
</html>