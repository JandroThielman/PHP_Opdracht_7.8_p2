<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opdracht 9</title>
</head>
<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="tekst">Tekst:</label>
        <input type="text" name="tekst" id="tekst" required>
        <br>
        
        <input type="radio" name="uitvoermethode" value="uppercase" checked>
        <label>Hoofdletters</label> <br>
        
        <input type="radio" name="uitvoermethode" value="lowercase">
        <label>Kleine letters</label> <br>
        
        <input type="radio" name="uitvoermethode" value="omgekeerd">
        <label>Omgekeerde volgorde</label> <br>
        
        <input type="radio" name="uitvoermethode" value="woorden_omgekeerd">
        <label>Woorden omgekeerd</label> <br>
        
        <br>
        <button type="submit">Verzenden</button>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['tekst'])) {
        $ingevuldeTekst = $_POST['tekst'];
        
        if (isset($_POST['uitvoermethode'])) {
            $uitvoermethode = $_POST['uitvoermethode'];
            switch ($uitvoermethode) {
                case 'uppercase':
                    $resultaat = strtoupper($ingevuldeTekst);
                    break;
                case 'lowercase':
                    $resultaat = strtolower($ingevuldeTekst);
                    break;
                case 'omgekeerd':
                    $resultaat = strrev($ingevuldeTekst);
                    break;
                case 'woorden_omgekeerd':
                    $woorden = explode(' ', $ingevuldeTekst);
                    $omgekeerdeWoorden = array_reverse($woorden);
                    $resultaat = implode(' ', $omgekeerdeWoorden);
                    break;
                default:
                    $resultaat = "Ongeldige uitvoermethode";
                    break;
            }
            
            echo '<p>' . htmlspecialchars($resultaat) . '</p>';
        }
    }
}
?>

</body>
</html>
