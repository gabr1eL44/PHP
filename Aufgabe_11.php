<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aufgabe 11</title>
</head>
<body>
    <?php
        function func(int $number, $val = -1, $rounds = 1) {
            if ($val == -1)
                $val = $number;
            if ($val < 1000)
                $rounds = func($number, $val*$number, ++$rounds);
            return $rounds; 
        }
        for ($i = 2; $i < 21; $i++) {
            $k = func($i);
            echo "<p>Die Zahl ".$i." übersteigt nach ".$k." mal mit sich selbst multiplizieren die 1000</p>";
        }
    ?>
</body>
</html>