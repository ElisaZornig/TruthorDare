<?php
session_start();

// Zorg ervoor dat we de vriendenlijst uit de sessie ophalen als deze bestaat
if (!isset($_SESSION['friends'])) {
    $_SESSION['friends'] = [];
}
$friends = $_SESSION['friends'];
// Controleer of het formulier is ingediend voor toevoegen
if (isset($_POST['submit'])) {
    if (!empty($_POST['naam'])) {
        // Voeg de ingevoerde naam toe aan de array
        array_push($friends, $_POST['naam']);
        $_SESSION['friends'] = $friends; // Werk de sessie bij
    }
}

// Verwijderen van een vriend als op de verwijderknop is geklikt
if (isset($_POST['remove'])) {
    $nameToRemove = $_POST['remove']; // Haal de naam op die verwijderd moet worden
    if (($key = array_search($nameToRemove, $friends)) !== false) {
        unset($friends[$key]); // Verwijder de vriend uit de array
        $_SESSION['friends'] = ($friends); // Werk de sessie bij
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Friends</title>
</head>
<body>

<!-- Formulier om een nieuwe vriend toe te voegen -->
<form method="post">
    <input type="text" id="naam" name="naam" value="" placeholder="Voer een naam in">
    <button class="add-button" type="submit" name="submit">Voeg toe</button>
</form>

<!-- Lijst met vrienden en optie om te verwijderen -->
<h3>Vriendenlijst:</h3>

    <?php if (!empty($friends)) { ?>
        <?php foreach ($friends as $friend) { ?>
            <div class = friend>
                <?= htmlspecialchars($friend); ?>
                <!-- Verwijderknop, verstuurt de naam van de vriend die verwijderd moet worden -->
                <form method="post">
                    <button type="submit" name="remove" value="<?= htmlspecialchars($friend); ?>">Remove</button>
                </form>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class = "friend">Geen vrienden toegevoegd.</div>
    <?php } ?>
<a href = "index.php">Ga naar het spel</a>
</body>
</html>
