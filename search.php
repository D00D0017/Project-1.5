<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/pubchem.min.css">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            background-color: #FFFFFF;
            padding: 10px;
        }
        .header {
            grid-area: header;
            background-color: #1a446e;
            color: #FFFFFF;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 30px;
        }
        .home-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px; /* Add margin to create a gap */
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .home-button:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 5px 0;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }
        .search-input {
            flex: 1;
            padding: 5px;
            margin-right: 10px;
        }
        .search-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class = "grid-container">
    <div class="header">
        <div>Data Visualization</div>
        <form action="search.php" method="get" class="search-bar">
            <input type="text" name="query" class="search-input" placeholder="Search...">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
    <div class = "main">
        <?php
        // Include the database connection file
        include 'conn.php';

        if (isset($_GET['query'])) {
            $query = $_GET['query'];

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("SELECT * FROM adme_table WHERE Name LIKE ? ORDER BY Name ASC");
            $searchQuery = "%" . $query . "%";
            $stmt->bind_param("s", $searchQuery);
            $stmt->execute();
            $result = $stmt->get_result();

            // Add a home button
            echo '<a href="index.php" class="home-button">Home</a>';

            // Check if any rows are returned
            if ($result->num_rows > 0) {
                echo '<ul>';
                // Loop through each row
                while ($row = $result->fetch_assoc()) {
                    // Display each data entry as a list item with a link to individual_data.php
                    echo "<li><a href='individual_data.php?pubchem_id=" . htmlspecialchars($row['PubChem ID']) . "'>" . htmlspecialchars($row['Name']) . "</a></li>";
                }
                echo '</ul>';
            } else {
                echo "No results found.";
            }

            // Close the statement and the database connection
            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</div>
</body>
</html>
