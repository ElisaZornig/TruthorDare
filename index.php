<?php
session_start();

// Zorg ervoor dat we de vriendenlijst uit de sessie ophalen als deze bestaat
if (!isset($_SESSION['friends'])) {
$_SESSION['friends'] = [];
}
$friends = $_SESSION['friends'];

require_once "db/db.php";
/** @var mysqli $db */
$query = "SELECT `question`, `type` FROM `truth_or_dare_questions`"; // Haal de type kolom op
$result = mysqli_query($db, $query);

$questions = [];
if ($result && mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
$questions[] = [
'question' => $row['question'],
'type' => $row['type'] // Voeg het type toe aan de array
];
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
<p class="chosen-player" id="chosen-player">
    <?php
    if (!empty($friends)) {
        echo $friends[0];
    }
    ?>
</p>
<p id="current-question">
    <?php
    // Toon standaard de eerste vraag
    echo $questions[0]['question'];
    ?>
</p>
<button id="next-question">Next</button>
<a href="add_friends.php">Voeg vrienden toe</a>

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
        let randomQuestionIndex;

        // Blijf zoeken naar een vraag die geen type 1 heeft als er geen spelers zijn
        do {
            randomQuestionIndex = getRandomNumber(0, questions.length - 1);
        } while (friends.length === 0 && questions[randomQuestionIndex].type == 1);

        // Genereer een nieuwe speler die niet dezelfde is als de vorige
        if (friends.length > 0) {
            let randomPlayerIndex;
            do {
                randomPlayerIndex = getRandomNumber(0, friends.length - 1);
            } while (randomPlayerIndex === lastPlayer);  // Blijf genereren als het dezelfde speler is

            const chosenPlayer = friends[randomPlayerIndex]; // Bewaar de huidige speler
            playerDisplay.textContent = chosenPlayer; // Toon de nieuwe willekeurige speler
            lastPlayer = randomPlayerIndex;  // Werk de laatst gekozen speler bij

            // Als de vraag type 1 is, voeg een willekeurige speler toe aan het einde
            if (questions[randomQuestionIndex].type == 1) {
                let randomOtherPlayerIndex;
                do {
                    randomOtherPlayerIndex = getRandomNumber(0, friends.length - 1);
                } while (randomOtherPlayerIndex === randomPlayerIndex); // Zorg ervoor dat het niet de huidige speler is

                const randomOtherPlayer = friends[randomOtherPlayerIndex]; // Kies een andere speler
                questionDisplay.textContent = questions[randomQuestionIndex].question + " " + randomOtherPlayer; // Voeg de naam van de speler toe
            } else {
                questionDisplay.textContent = questions[randomQuestionIndex].question; // Toon alleen de vraag als type geen 1 is
            }
        } else {
            // Toon alleen de vraag als er geen spelers zijn (geen type 1)
            questionDisplay.textContent = questions[randomQuestionIndex].question;
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
