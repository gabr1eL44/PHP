<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aufgabe 9</title>
</head>
<body>
    <h1>Einkaufsliste</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <?php
            if(isset($_GET['object'])) {
                $shopList = $_GET['object'];
                foreach($shopList as $object)
                    echo '<input type="checkbox" name="object[]" value="'.$object.'" checked>'.$object.'<br>'; 
            }
            if(isset($_GET['item']) AND !empty($_GET['item']))
                echo '<input type="checkbox" name="object[]" value="'.$_GET["item"].'" checked>'.$_GET["item"].'<br>';                 
        ?>
        <label for="item" value="Neuer Wert:"></label><br>
        <input type="text" name="item" autofocus><br>
        <input type="submit" value="Bestätigen">
    </form>
    <br>
</body>
</html>