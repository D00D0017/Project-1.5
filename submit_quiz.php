<?php
include 'conn.php';

$score = 0;
$displayed_questions = isset($_POST['displayed_questions']) ? intval($_POST['displayed_questions']) : 0;

// Fetch all questions to evaluate answers
$sql = "SELECT * FROM quiz_questions";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $question_id = $row['id'];
    $correct_option = $row['correct_option'];
    if (isset($_POST["question$question_id"]) && $_POST["question$question_id"] == $correct_option) {
        $score++;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .result-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .btn-home {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-home:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Celebratory effect */
        .celebrate {
            background-color: #7FFF00; /* Light green */
            animation: celebrate 2s infinite alternate;
        }

        @keyframes celebrate {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        /* Moody effect */
        .moody {
            background-color: #696969; /* Dim gray */
            animation: moody 2s infinite alternate;
        }

        @keyframes moody {
            0% { filter: grayscale(0%); }
            100% { filter: grayscale(100%); }
        }

                /* Neutral effect */
                .neutral {
            background-color: #FFA500; /* Orange */
            animation: neutral 2s infinite alternate;
        }

        @keyframes neutral {
            0% { transform: scale(1); }
            100% { transform: scale(0.95); }
        }

    </style>
</head>
<body>
    <div class="result-container">
        <h1>Quiz Result</h1>
        <p>Your score is: <?php echo $score . '/' . $displayed_questions; ?></p>
        <a href="index.php" class="btn-home">Back to Home</a>
    </div>

   <script>
       // Assuming you have fetched the score from PHP
        var score = <?php echo json_encode($score); ?>;
        var displayedQuestions = <?php echo json_encode($displayed_questions); ?>;

        // Select the body or relevant container where you want to apply the effect
        var body = document.body; // Replace with your actual container or body

        // Remove any existing classes
        body.classList.remove('celebrate', 'moody', 'neutral');

        // Apply celebratory effect if score is high
        if (score === displayedQuestions) {
            body.classList.add('celebrate');
        }
        // Apply moody effect if score is low
        else if (score === 0) {
            body.classList.add('moody');
        }

        // Apply neutral effect if score is between 1 and 4
        else if (score >= 1 && score <= 4) {
        body.classList.add('neutral');

        }
    </script>

</body>
</html>
