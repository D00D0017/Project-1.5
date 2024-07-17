<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <title>Quiz Results</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Quiz Results</h1>
        <?php
        include 'conn.php';

        $score = 0;
        $total_questions = 5;

        for ($i = 1; $i <= $total_questions; $i++) {
            if (isset($_POST["question$i"])) {
                $answer = $_POST["question$i"];

                // Retrieve the correct answer from the database
                $sql = "SELECT MW FROM adme_table WHERE MW = '$answer'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $score++;
                }
            }
        }

        echo "<p>You scored $score out of $total_questions.</p>";

        $conn->close();
        ?>
        <a href="quiz.php" class="btn btn-primary">Try Again</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>