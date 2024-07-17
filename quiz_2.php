<?php
// Include the database connection file
include 'conn.php';

// Fetch random questions from the database
$sql = "SELECT * FROM quiz_questions ORDER BY RAND() LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Chemical Compound Quiz</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .grid-container {
        display: grid;
        grid-template-areas:
            'header header header'
            'main main main'
            'footer footer footer';
        gap: 10px;
        background-color: #f4f4f4;
        padding: 0;
    }

    .header {
        grid-area: header;
        color: #FFFFFF;
        padding: 2px;
        text-align: left;
        font-size: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        top: 0;
        width: 100%;
        position: fixed;
        z-index: 100;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        background-color: #1a446e;
        border-bottom: 3px solid #F1C40F;
    }

    .header-default {
        background-color: #1a446e;
    }

    .header-transparent {
        background-color: transparent !important;
        color: black;
        border-bottom: 3px transparent;
    }

    .header-logo {
        display: flex;
        align-items: center;
        flex-grow: 1;
    }

    .header-logo img {
        max-height: 50px;
        margin-right: 15px;
    }

    .header-button {
    margin-left: 1000px;
    }

    .header-button:hover {
        margin-left: 1000px;
    }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
            color: #333;
        }
        .question {
            margin-bottom: 15px;
        }
        .question p {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .options label {
            display: block;
            margin-bottom: 10px;
            font-size: 1em;
        }
        .btn-submit {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }

        .home-button {
        display: inline-block;
        padding: 5px 10px; /* Reduced padding */
        font-size: 20px; /* Adjusted font size */
        color: #fff;
        background-color: #007bff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

        .home-button:hover {
        background-color: #F1C40F;
        transform: scale(1.05);
        color: #fff;

    }
    </style>

</head>
<body>
    <header class="header" id="header">
        <div class="header-logo">
            <img src="images/Chemistry Lab Chemical Logo.png" alt="headerLogo">
            <div>ChemViewer</div>
            <div class="header-button">
            <a href="index.php" class="home-button">Home</a>
</header>

    <div class="container">
        <h1>Chemical Compound Quiz</h1>
        <form action="submit_quiz.php" method="post">
        <?php
    include 'conn.php';
    
    // Fetch 5 random questions from the database
    $sql = "SELECT * FROM quiz_questions ORDER BY RAND() LIMIT 5";
    $result = $conn->query($sql);
    $displayed_questions = 0;

    while ($row = $result->fetch_assoc()) {
        $question_id = $row['id'];
        $question = $row['question'];
        $option_a = $row['option_a'];
        $option_b = $row['option_b'];
        $option_c = $row['option_c'];
        $option_d = $row['option_d'];
        $displayed_questions++;
        
        echo "<div>";
        echo "<p>$question</p>";
        echo "<label><input type='radio' name='question$question_id' value='A'> $option_a</label><br>";
        echo "<label><input type='radio' name='question$question_id' value='B'> $option_b</label><br>";
        echo "<label><input type='radio' name='question$question_id' value='C'> $option_c</label><br>";
        echo "<label><input type='radio' name='question$question_id' value='D'> $option_d</label><br>";
        echo "</div>";
    }
    ?>
        <input type="hidden" name="displayed_questions" value="<?php echo $displayed_questions; ?>">
            <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var header = document.getElementById('header');

        // Initial check
        if (window.scrollY > 0) {
            header.classList.add('header-transparent');
            header.classList.remove('header-default');
        } else {
            header.classList.add('header-default');
            header.classList.remove('header-transparent');
        }

        // Scroll event listener
        window.addEventListener('scroll', function() {
            if (window.scrollY > 0) {
                header.classList.add('header-transparent');
                header.classList.remove('header-default');
            } else {    
                header.classList.add('header-default');
                header.classList.remove('header-transparent');
            }
        });
    });
</script>

</body>
</html>
