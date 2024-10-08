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

<p id="current-question">
    <?= $questions[0]; // Toont de eerste vraag standaard ?>
</p>
<button id="next-question">Next</button>

<script>
    // Maak de PHP-array beschikbaar in JavaScript
    const questions = <?php echo json_encode($questions); ?>;

    const button = document.getElementById('next-question');
    const questionDisplay = document.getElementById('current-question');

    // Voeg een event listener toe voor het 'click' evenement
    button.addEventListener('click', function() {
        let randomNum = getRandomNumber(0, questions.length - 1); // Genereer een willekeurig index
        questionDisplay.textContent = questions[randomNum]; // Toon de willekeurige vraag
    });

    function getRandomNumber(min, max) {
        // Zorg ervoor dat de getallen juist zijn
        if (min > max) {
            throw new Error('Het minimum moet kleiner zijn dan het maximum.');
        }
        // Genereer een willekeurig getal tussen min en max (inclusief)
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

</script>

</body>
</html>
