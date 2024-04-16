<?php
// PHP code to retrieve flashcards from the server

// Database connection parameters
$host = 'localhost';
$dbname = 'your_database_name';
$username = 'your_database_username';
$password = 'your_database_password';

try {
    // Connect to the database
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch flashcards from the database
    $stmt = $db->query("SELECT * FROM flashcards");
    $flashcards = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display flashcards
    foreach ($flashcards as $flashcard) {
        echo '<div class="card">';
        echo '<p class="question-div">' . htmlspecialchars($flashcard['question']) . '</p>';
        echo '<p class="answer-div hide">' . htmlspecialchars($flashcard['answer']) . '</p>';
        echo '<a href="#" class="show-hide-btn">Show/Hide</a>';
        echo '</div>';
    }
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
