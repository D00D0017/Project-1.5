<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <script src="https://cdn.jsdelivr.net/npm/ngl@0.10.4/dist/ngl.js"></script>
    <title>Chemical Quiz</title>
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

        .quiz-question {
            margin-bottom: 20px;
        }

        .quiz-options {
            list-style-type: none;
            padding: 0;
        }

        .quiz-options li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header class="header">
    <button class="home-button" onclick="location.href='index.php'">Home</button>
    </header>
    <div class="container">
        <h1>Chemical Quiz</h1>
        <form action="quiz_result.php" method="post">
            <?php
            include 'conn.php';

            // Array of properties to ask questions about
            $properties = array(
                'MW', 'Formula', 'TPSA', 'iLOGP', 'ESOL Log S'
            );

            // Shuffle the properties array to randomize the question order
            shuffle($properties);

            // Limit the number of questions (adjust as needed)
            $num_questions = 5;


            // SQL query to retrieve questions and options
            $sql = "SELECT * FROM adme_table ORDER BY RAND() LIMIT 2";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $question_number = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='quiz-question'>";
                    echo "<h3>Question $question_number: What is the molecular weight of " . $row['Name'] . "?</h3>";
                    echo "<ul class='quiz-options'>";
                    echo "<li><input type='radio' name='question$question_number' value='" . $row['MW'] . "'> " . $row['MW'] . "</li>";
                    echo "<h3>Question $question_number: What is the formula of " . $row['Name'] . "?</h3>";
                    echo "<ul class='quiz-options'>";
                    echo "<li><input type='radio' name='question$question_number' value='" . $row['Formula'] . "'> " . $row['Formula'] . "</li>";

                    // Add more options here. You can randomly generate incorrect options if needed.
                    echo "</ul>";
                    echo "</div>";
                    $question_number++;
                }
            } else {
                echo "<p>No questions found.</p>";
            }

            $conn->close();
            ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
