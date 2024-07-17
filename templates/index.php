<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <title>ChemViewer</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #E6E6FA;
            margin: 0;
            padding: 0;
        }
        .grid-container {
            display: grid;
            grid-template-areas:
                'header header header'
                'main main main'
                'footer1 footer1 footer1'
                'footer2 footer2 footer2';
            gap: 10px;
            padding: 0px;
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
            width: 97%;
            position: fixed;
            z-index: 100; /* Ensure the header appears above other content */
            transition: background-color 0.3s ease; /* Smooth transition for background color change */
        }

        .header-default {
            background-color: #1a446e; /* Default background color */
        }

        .header-transparent {
            background-color: transparent !important; /* Transparent background color */
            color: black;
        }

        .header-logo {
            display: flex;
            align-items: center;
            flex-grow: 1; /* Add flex-grow: 1; */

        }
        .header-logo img {
            max-height: 50px;
            margin-right: 15px;
        }
        .main {
            grid-area: main;
            background-color: #F8F8FF;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 80px; /* Add some margin to avoid content being hidden behind the fixed header */
        }
        .footer {
            grid-area: footer;
            background-color: #1a446e;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer1 {
            grid-area: footer1;
        }
        .footer2 {
            grid-area: footer2;
            background-color: #1f2937;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #1a446e;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
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
        }
        .search-input {
            flex: 1;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .search-button:hover {
            background-color: #0056b3;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .compound-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .compound-grid div {
            background-color: #FFF;
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
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
        }
    </style>
</head>
<body>
<div class="grid-container">
    <div class="header " id="header">
    <div class="header-logo">
        <img src="images/Chemistry Lab Chemical Logo.png" alt="headerLogo">
        <div>ChemViewer</div>
    </div>
    <form action="search.php" method="get" class="search-bar">
            <input type="text" name="query" class="search-input" placeholder="Search...">
            <button type="submit" class="search-button">Search</button>
    </form>
    </div>
    <div class="main">
        <h1>Chemical Compound</h1>
        <br>
        <div class="compound-grid">
        <?php
            // Include the database connection file
            include 'conn.php';

            // SQL query to retrieve data from the 'adme_table' and order by 'Name'
            $sql = "SELECT `Name`, `PubChem ID` FROM adme_table ORDER BY Name ASC";

            // Execute the query
            $result = $conn->query($sql);

            // Check if any rows are returned
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row
                while ($row = mysqli_fetch_assoc($result)) {
                    // Display each data entry in a grid cell with a clickable link
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
    <div class="footer footer1">Total entries: <?php echo $total_entries; ?></div>
    <div class="footer footer2"><p>© 2024 ChemViewer. All rights reserved.</p>
</div>
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


<script type="text/javascript" async="" src="js/pinger.js"></script>
<script type="module" src="js/react.production.min.js"></script>
<script type="module" src="js/react-dom.production.min.js"></script>
<script type="module" src="js/summary.min.js"></script>
</body>
</html>
