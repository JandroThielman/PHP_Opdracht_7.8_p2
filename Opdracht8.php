<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 8</title>
</head>
<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="fruits">Fruitsoort</label>
        <input type="text" name="fruits" id="fruits" required>
        <br>
        <button type="submit" name="toevoegen">Toevoegen</button>
        <br><br>
        <p>-----------------------------------------------------------</p>
        <button type="submit" name="sorteren">Sorteren</button>
        <button type="submit" name="schudden">Schudden</button>
    </form>

    <?php

session_start();


function sortArray() {
    if (isset($_SESSION['fruit'])) {
        sort($_SESSION['fruit']);
    }
}


function shuffleArray() {
    if (isset($_SESSION['fruit'])) {
        shuffle($_SESSION['fruit']);
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['toevoegen'])) {
       
        if (!isset($_SESSION['fruit'])) {
            $_SESSION['fruit'] = array();
        }
        $newFruit = $_POST['fruits'];
        $_SESSION['fruit'][] = $newFruit;
    } elseif (isset($_POST['sorteren'])) {
        sortArray();
    } elseif (isset($_POST['schudden'])) {
        shuffleArray();
    }
}
 
    if (isset($_SESSION['fruit'])) {
        echo '<h2>Inhoud van de array</h2>';
        foreach ($_SESSION['fruit'] as $fruits) {
            echo '- ' . htmlspecialchars($fruits) . '<br>';
        }
    } else {
        echo '<p>No fruit in the array.</p>';
    }
    ?>

</body>
</html>
