<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <title>Ketum Viewer</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
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
        padding: 20px;
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
    margin-right: 20px;
}

    .main {
        grid-area: main;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 80px;
        border-radius: 8px;
    }

    .footer {
        grid-area: footer;
        background-color: #1f2937;
        color: #fff;
        padding: 20px;
        text-align: center;
        border-top: 4px solid #F1C40F;
    }

    a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #0056b3;
    }

    .search-bar {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .search-input {
        flex: 1;
        padding: 10px;
        margin-right: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }

    .search-input:focus {
        border-color: #007bff;
        outline: none;
    }

    .search-button {
        padding: 10px 20px;
        background-color: #F1C40F;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .search-button:hover {
        background-color: #0056b3;
        transform: scale(1.05);
        color: #fff;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        
    }

    .button-container {
        margin-top: 10px;
        display: flex;
        justify-content: center;
    }


    .btn {
        padding: 10px 10px;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s ease-in-out;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }


    .description-area {
        margin-top: 20px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .description-text {
        max-width: 600px;
        font-size: 16px;
        text-align: center;
    }

    .compound-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .compound-grid div {
        background-color: #FFF;
        padding: 20px;
        border: 1px solid #ddd;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
    }

    .compound-grid div a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease;
    }

    .compound-grid div a:hover {
        color: #0056b3;
    }

    .compound-grid div:hover {
        background-color: #f0f8ff;
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .quiz-button {
    display: inline-block;
    padding: 5px 10px; /* Reduced padding */
    font-size: 20px; /* Adjusted font size */
    color: #fff;
    background-color: #007bff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.quiz-button:hover {
        background-color: #F1C40F;
        transform: scale(1.05);
        color: #fff;

}

</style>
</head>
<body>
<div class="grid-container">
    <header class="header" id="header">
        <div class="header-logo">
            <img src="images/Chemistry Lab Chemical Logo.png" alt="headerLogo">
            <div>ChemViewer</div>
        </div>
        <div class="header-button">
            <a href="quiz_2.php" class="quiz-button">Take Quiz</a>
</header>
    <div class="main">
        <h1>Chemical Compound</h1>
        <form action="search.php" method="get" class="search-bar">
            <input type="text" name="query" class="search-input" placeholder="Search...">
            <button type="submit" class="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    <path fill="none" d="M0 0h24v24H0z"/>
        </svg>
            </button>
        </form>
        <div class="description-area">
            <h2>Description</h2>
            <p class="description-text">This section contains a list of chemical compounds with their respective names. Click on any name to view detailed information about the compound.</p>
        </div>
        <div class = "button-container">
            <button class="btn btn-primary" data-toggle="collapse" data-target="#demo">Data Entries</button>
        </div>
        <div id="demo" class="collapse">
            <div class="compound-grid">
                <?php
                // Include the database connection file
                include 'conn.php';

                // SQL query to retrieve data from the 'adme_table' and order by 'Name'
                $sql = "SELECT * FROM adme_table ORDER BY Name ASC";

                // Execute the query
                $result = $conn->query($sql);   

                // Check if any rows are returned
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Display each data entry as a list item
                        echo "<div><a href='individual_data.php?pubchem_id={$row['PubChem ID']}'>{$row['Name']}</a></div>";
                    }
                } else {
                    echo "<div colspan='4'>No data found.</div>";
                }

                // SQL query to count the total number of rows in the 'adme_table'
                $count_sql = "SELECT COUNT(*) as total FROM adme_table";
                $count_result = $conn->query($count_sql);
                $count_row = mysqli_fetch_assoc($count_result);
                $total_entries = $count_row['total'];

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
    <div class="footer footer1">Total entries: <?php echo $total_entries; ?></div>
    <div class="footer footer2"><p>© 2024 ChemViewer. All rights reserved.</p></div>
</div>

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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
