<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/ngl@0.10.4/dist/ngl.js"></script>
    <title>Test Entries</title>

    <style>
            .data-button-entries {
            background-color: #8ed7e3;
            color: #000000; 
            border: 2px solid;
            border-color: #F1C40F;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            position: sticky;
            position: -webkit-sticky;
            top: 20px;
            left: 20px; /* Changed from right to left */
            z-index: 10;
        }

        .data-button-entries:hover {
            background-color: #0056b3;
            color: #fff;
            border: 2px solid;
            border-color: #8ed7e3;

        }

        #demo {
            position: absolute;
            z-index: 1;
        }

    </style>
</head>
<body>

<div class="main">
    <div class="data-button-container">
    <div class="data-button">
                <button class="data-button-entries btn btn-primary" data-toggle="collapse" data-target="#demo">Data Entries</button>
            </div>
            <div id="demo" class="collapse">
                <ul class="list-group">
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
                            echo "<li class='list-group-item'><a href='individual_data.php?pubchem_id={$row['PubChem ID']}'>{$row['Name']}</a></li>";
                        }
                    } else {
                        echo "<li class='list-group-item'>No data found.</li>";
                    }
                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </ul>
            </div>
                </div>
                </div>

                <script>
        document.addEventListener('DOMContentLoaded', function() {
        var collapseButton = document.querySelector('.btn.btn-primary');
        var collapseSection = document.getElementById('demo');

        collapseButton.addEventListener('click', function() {
            if (collapseSection.classList.contains('show')) {
                collapseSection.classList.remove('show');
            } else {
                collapseSection.classList.add('show');
            }
        });
    });

</script>    
</body>

</html>