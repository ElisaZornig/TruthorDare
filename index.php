<?php
session_start();

// Zorg ervoor dat we de vriendenlijst uit de sessie ophalen als deze bestaat
if (!isset($_SESSION['friends'])) {
    $_SESSION['friends'] = [];
}
$friends = $_SESSION['friends'];

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
<p class = "chosen-player" id = "chosen-player" >
    <?php
    if(!empty($friends)){
        echo $friends[0];
    }

    ?>
</p>
<p id="current-question">
    <?= $questions[0]; // Toont de eerste vraag standaard ?>
</p>
<button id="next-question">Next</button>
<a href = "add_friends.php">Voeg vrienden toe</a>


</body>
</html>
<script>
    // Maak de PHP-array beschikbaar in JavaScript
    const questions = <?= json_encode($questions); ?>;
    const friends = <?= json_encode($friends); ?>;
    let lastPlayer = -1;  // Houdt de laatste speler bij
    const button = document.getElementById('next-question');
    const questionDisplay = document.getElementById('current-question');
    const playerDisplay = document.getElementById('chosen-player');

    // Voeg een event listener toe voor het 'click' evenement
    button.addEventListener('click', function() {
        // Genereer een willekeurig getal voor de vraag
        let randomQuestionIndex = getRandomNumber(0, questions.length - 1);
        questionDisplay.textContent = questions[randomQuestionIndex]; // Toon de willekeurige vraag

        // Genereer een nieuwe speler die niet dezelfde is als de vorige
        if (friends.length > 0) {
            let randomPlayerIndex;
            do {
                randomPlayerIndex = getRandomNumber(0, friends.length - 1);
            } while (randomPlayerIndex === lastPlayer);  // Blijf genereren als het dezelfde speler is

            playerDisplay.textContent = friends[randomPlayerIndex]; // Toon de nieuwe willekeurige speler
            lastPlayer = randomPlayerIndex;  // Werk de laatst gekozen speler bij
        }
    });

    function getRandomNumber(min, max) {
        // Zorg ervoor dat de getallen juist zijn
        if (min > max) {
            throw new Error('Het minimum moet kleiner zijn dan het maximum.');
        }
        // Genereer een willekeurig getal tussen min en max (inclusief)
        return Math.floor(Math.random() * (max + 1));
    }
</script>
