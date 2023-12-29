<!DOCTYPE html>
<html lang="nl-NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 6</title>
</head>
<body>

    <form method="post">
        <label for="number">Cijfer:</label>
        <input type="number" name="number" id="number" required min ="0" max ="10">
        <button type="submit">Toevoegen</button>
    </form>

    <?php

        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
            if (isset($_POST['number'])) {
     
                $submittedNumber = $_POST['number'];

                $_SESSION['numbers'][] = $submittedNumber;
            }
        }

        if (isset($_SESSION['numbers'])) {

            $count = count($_SESSION['numbers']);

            echo 'Aantal ingevoerde cijfers: ' . $count . '<br>';

            $sum = array_sum($_SESSION['numbers']);
            $gemiddelde = $count > 0 ? $sum / $count : 0;

            $gemiddelde = max(1, min(10, $gemiddelde));

            echo 'gemiddelde: ' . number_format ($gemiddelde, 1);

        }
    ?>

</body>
</html>
