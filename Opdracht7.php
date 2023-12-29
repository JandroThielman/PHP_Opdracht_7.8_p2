<!DOCTYPE html>
<html lang="nl-NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Opdracht 6</title>
</head>
<body>

    <form method="post">
        <label for="number">Startkapitaal</label>
        <input type="number" name="number" id="number" required>
        <br>
        <label for="procent">Rentepercentage</label>
        <input type="number" name="procent" id="procent" required>
        <br>
        <label for="num">Jaarlijkse opname</label>
        <input type="number" name="num" id="num" required>
        <br>
        <button type="submit" name="verzenden">Bereken de looptijd</button>
        <br><br>
    </form>

    <?php

        if (isset ($_POST['verzenden'])) {

            $number = $_POST['number'];
            $rente = $_POST['procent'];
            $uit = $_POST['num'];
            $jaar = 0;

            while ($number >= $uit) {
                $number = $number * (1 + $rente / 100) - $uit;
                $jaar++;
            }

            echo "U kunt " . $jaar . " jaar lang €" . $uit . " opnemen";
            
        } else {
            echo $number;
        }

    ?>

</body>
</html>