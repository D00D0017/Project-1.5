<?php
include 'conn.php';

if (isset($_GET['pubchem_id'])) {
    $pubchem_id = mysqli_real_escape_string($conn, $_GET['pubchem_id']);
    $sql = "SELECT * FROM adme_table WHERE `PubChem ID` = '$pubchem_id'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        echo "<h1>{$data['Name']}</h1>";

        // Other sections of your code here...

        // Right side sections
        echo '<div id="structure-image" class="section" style="grid-row: 1; grid-column: 2;">';
        echo "<h2>Structure Image</h2>";
        echo '<div id="3dviewer" style="width: 600px; height: 400px;"></div>';
        echo '</div>';

        // Pass the PubChem ID to JavaScript
        echo "<script>
                let pubchemId = '{$pubchem_id}';
              </script>";

    } else {
        echo "<h1>Data Not Found</h1>";
    }
} else {
    echo "<h1>No PubChem ID Provided</h1>";
}
?>

<!-- Include 3Dmol.js library -->
<script src="https://3Dmol.csb.pitt.edu/build/3Dmol-min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let viewer = $3Dmol.createViewer("3dviewer", { backgroundColor: 'white' });

        fetch(`get_sdf.php?pubchem_id=${pubchemId}`)
            .then(response => response.text())
            .then(sdfData => {
                viewer.addModel(sdfData, "sdf");  // Load SDF data
                viewer.setStyle({}, {stick: {}}); // Set style
                viewer.zoomTo();                  // Zoom to fit
                viewer.render();                  // Render the viewer
            })
            .catch(error => console.error('Error loading SDF:', error));
    });
</script>
