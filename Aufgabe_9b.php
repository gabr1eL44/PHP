<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aufgabe 9b</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <label for="">Bitte geben Sie Werte ein:</label><br><br>
        <?php
            if (isset($_GET['zahl']))
                $count = count($_GET['zahl']) + intval($_GET['anzahl']);
            else
                $count = 3;

            if (isset($_GET['zahl'])) {
                $numbers = $_GET['zahl'];
                for ($i = 0; $i < count($numbers); $i++)
                    echo '<input type="text" name="zahl[]" value='.$numbers[$i].'><br><br>';
                for ($i = count($numbers); $i < $count; $i++)
                    echo '<input type="text" name="zahl[]"><br><br>';
            }
            else
                for ($i = 0; $i < $count; $i++)
                    echo '<input type="text" name="zahl[]"><br><br>';

            if (isset($_GET['zahl'])) {
                $min = $numbers[0]; $max = $numbers[0]; $sum = 0;
                foreach ($numbers as $element) {
                    if ($element < $min)
                        $min = $element;
                    else if ($element > $max)
                        $max = $element;
                    if (is_numeric($element))
                        $sum += $element;
                    else {
                        echo "<p>Leider wurde keine Zahl angegeben!</p>";
                        goto abort;
                    } 
                }
                echo "<p>Die kleinste Zahl: ".$min."</p>";
                echo "<p>Die größte Zahl: ".$max."</p>";
                echo "<p>Der Durchschnitt: ".($sum / count($numbers))."</p>";
            }
            abort:
        ?>
        <label for="anzahl">Sollen noch Blöcke eingefügt werden?</label><br>
        <input type="text" name="anzahl"><br><br>
        <input type="submit" value="Bestätigen">
    </form>
    <br>
</body>
</html>