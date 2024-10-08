<?php
require_once "db/db.php";
/** @var mysqli $db */
$query = "SELECT `question` FROM `truth_or_dare_questions`";
$result = mysqli_query($db, $query);

$questions = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row['question']; // Voeg elke vraag toe aan de array
    }
} else {
    echo "geen vragen gevonden";
    exit();
}
if (isset($_POST['remove'])) {
    $questionToRemove = $_POST['remove']; // Haal de naam op die verwijderd moet worden

    $removequery = "DELETE FROM `truth_or_dare_questions` WHERE question = '$questionToRemove'";
    $result = mysqli_query($db, $removequery);
    if ($result) {
        // Voorkom dat het formulier opnieuw wordt ingediend als de gebruiker de pagina herlaadt
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Fout bij het verwijderen van de vraag.";
    }
}
if (isset($_POST['submit'])) {
    if (!empty($_POST['vraag'])) {
        $vraag = $_POST['vraag'];
        $addquery = "INSERT INTO `truth_or_dare_questions` (`id`, `question`) VALUES (NULL, '$vraag');";
        $result = mysqli_query($db, $addquery);
        if ($result) {
            // Voorkom dat het formulier opnieuw wordt ingediend als de gebruiker de pagina herlaadt
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Fout bij het toevoegen van de vraag.";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="text" id="vraag" name="vraag" value="" placeholder="Voeg een vraag toe">
    <button class="add-button" type="submit" name="submit">Voeg toe</button>
</form>
<a href = "index.php">Ga naar het spel</a>
<?php foreach($questions as $question){ ?>
<p> <?= $question; ?></p>
    <form method="post">
        <button type="submit" name="remove" value="<?= htmlspecialchars($question); ?>">Remove</button>
    </form>
<?php }
?>

</body>
</html>
