<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/pubchem.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Individual Data</title>
    <style>

body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Outer grid container */
.grid-container {
    display: grid;
    grid-template-areas:
        'header header header'
        'menu . .'
        'main main right'
        'footer1 footer1 footer1'
        'footer2 footer2 footer2';
    gap: 10px;
    background-color: #000000;
    padding: 0px;
}

/* Inner grid container */
.inner-grid-container {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Two columns */
    gap: 20px;
}

/* Section styling */
.section {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

#pubchem-id,
#physicochemical-properties,
#water-solubility,
#druglikeness,
#structure-image,
#lipophilicity,
#pharmacokinetics,
#medicinal-chemistry {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px; /* Adds space between sections */
    transition: background-color 0.3s ease;
}

#pubchem-id:hover,
#physicochemical-properties:hover,
#water-solubility:hover,
#druglikeness:hover,
#structure-image:hover,
#lipophilicity:hover,
#pharmacokinetics:hover,
#medicinal-chemistry:hover {
    background-color: #f0f0f0;
}

/* Specific heading styles */
#pubchem-id h2,
#physicochemical-properties h2,
#water-solubility h2,
#druglikeness h2,
#structure-image h2,
#lipophilicity h2,
#pharmacokinetics h2,
#medicinal-chemistry h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Specific paragraph styles */
#pubchem-id p,
#physicochemical-properties p,
#water-solubility p,
#druglikeness p,
#structure-image p,
#lipophilicity p,
#pharmacokinetics p,
#medicinal-chemistry p {
    margin-bottom: 15px;
    line-height: 1.8;
    color: #555;
}

.main {
    grid-area: main;
    background-color: #000000;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 10px; /* Add some margin to avoid content being hidden behind the fixed header */
    border-radius: 8px;
}

.header {
    grid-area: header;
    background-color: #1a446e;
    color: #FFFFFF;
    padding: 20px;
    text-align: left;
    font-size: 30px;
    position: relative;
    justify-content: space-between;
    display: flex;
    border-bottom: 3px solid #F1C40F;
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

.home-button {
    grid-area: menu;
    background-color: #F1C40F;
    color: #000000;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    position: sticky;
    top: 20px;
    left: 20px; /* Changed from right to left */
}

.home-button:hover {
    background-color: #0056b3;
    color: #fff;
}

h1 {
    color: #FDFEFE;
    text-align: center;
}

.nav {
    grid-area: nav;
    background-color: #e9ecef;
    padding: 20px;
    border-radius: 8px;
}

.footer {
    grid-area: footer;
    background-color: #1a446e;
    color: #fff;
    padding: 20px;
    text-align: center;
    border-top: 3px solid #F1C40F;
}

.footer1 {
    grid-area: footer1;
}

.footer2 {
    grid-area: footer2;
    background-color: #1f2937;
    border-top: 3px solid #F1C40F;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
    padding-left: 20px;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

.nav-list {
    padding: 0;
    margin: 0;
}

.nav-button {
    display: grid;
    margin-bottom: 10px;
    padding: 10px;
    text-align: center;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.nav-button.active {
    background-color: #0056b3;
    color: white;
    transform: scale(1.05);
}

.nav-button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.nav-item {
    margin-bottom: 10px;
}

.nav-link {
    display: block;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 8px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.nav-link:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

i.fa {
    cursor: pointer;
    margin-right: 5px;
}

.collapsed ~ .panel-body {
    padding: 0;
}

.collapse {
    display: none;
}

/* Button style for collapsible */
.panel-heading {
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 15px;
    border: none;
    text-align: left;
    outline: none;
    width: 100%;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.panel-heading:hover {
    background-color: #0056b3;
}

.panel-heading.collapsed {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.panel-body .collapse {
    border: 1px solid #ddd;
    border-top: none;
    padding: 20px;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
}

.right-sidebar {
    grid-area: right;
    background-color: #000000;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    position: sticky;
    top: 10px; /* Adjust this value as needed */
    height: fit-content; /* Ensure the sidebar doesn't take up full height */
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.right-sidebar .nav-button.active {
    background-color: #0056b3;
    color: white;
}

.nav-button {
    display: block;
    margin-bottom: 10px;
    padding: 8px 12px; /* Reduced padding for slimmer buttons */
    text-align: center;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 14px; /* Slightly reduced font size */
    border-radius: 4px; /* Optional: Add border radius for rounded corners */
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.nav-button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.search-bar {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
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
    color: #000000;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.search-button:hover {
    background-color: #0056b3;
    color: #fff;
    transform: scale(1.05);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Scroll to Top button styling */
.scroll-to-top {
    display: none; /* Hidden by default */
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000; /* Ensure it stays above other elements */
    background-color: #5D6D7E;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    opacity: 0; /* Start with the button invisible */
    transition: opacity 0.5s ease-in-out, transform 0.3s ease; /* Smooth transition */
}

.scroll-to-top.show {
    display: block; /* Show the button */
    opacity: 1; /* Make it fully visible */
    transform: scale(1.05);
}

.scroll-to-top:hover {
    background-color: #0056b3;
    transform: scale(1.1);
}
    </style>
</head>
<body>
<div class="grid-container">
    <div class="header" id="header">
    <div class="header-logo">
        <img src="images/Chemistry Lab Chemical Logo.png" alt="headerLogo">
        <div>Individual Data</div>
    </div>
    <form action="search.php" method="get" class="search-bar">
            <input type="text" name="query" class="search-input" placeholder="Search...">
            <button type="submit" class="search-button">Search</button>
    </form>
    </div>
    <button class="home-button" onclick="location.href='index.php'">Home</button>
    <div class="right-sidebar">
    <button class="nav-button" id="nav-pubchem-id" onclick="scrollToElement('pubchem-id')">PubChem ID</button>
    <button class="nav-button" id="nav-structure-image" onclick="scrollToElement('structure-image')">Structure Image</button>
    <button class="nav-button" id="nav-physicochemical-properties" onclick="scrollToElement('physicochemical-properties')">Physicochemical Properties</button>
    <button class="nav-button" id="nav-lipophilicity" onclick="scrollToElement('lipophilicity')">Lipophilicity</button>
    <button class="nav-button" id="nav-water-solubility" onclick="scrollToElement('water-solubility')">Water Solubility</button>
    <button class="nav-button" id="nav-pharmacokinetics" onclick="scrollToElement('pharmacokinetics')">Pharmacokinetics</button>
    <button class="nav-button" id="nav-druglikeness" onclick="scrollToElement('druglikeness')">Druglikeness</button>
    <button class="nav-button" id="nav-medicinal-chemistry" onclick="scrollToElement('medicinal-chemistry')">Medicinal Chemistry</button>
    

    </div>
    <div class="main">
    <?php
    include 'conn.php';

    if (isset($_GET['pubchem_id'])) {
        $pubchem_id = mysqli_real_escape_string($conn, $_GET['pubchem_id']);
        $sql = "SELECT * FROM adme_table WHERE `PubChem ID` = '$pubchem_id'";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            echo "<h1>{$data['Name']}</h1>";

            // Convert image blob to base64
        if (!empty($data['image_structure'])) {
            $base64Image = base64_encode($data['image_structure']);
        } else {
            $base64Image = null;
        }

            // Inner grid container
            echo '<div class="inner-grid-container">';


        // Left side sections
        echo '<section id="pubchem-id" class="section" style="grid-row: 1;">';
        echo "<h2>PubChem ID</h2>";
        echo "<p><strong>PubChem ID:</strong> {$data['PubChem ID']}</p>";
        echo "<p><strong>Canonical SMILES:</strong> {$data['Canonical SMILES']}</p>";
        echo '</section>';

        echo '<section id="physicochemical-properties" class="section" style="grid-row: 2;">';
        echo "<h2>Physicochemical Properties</h2>";
        echo "<p><strong>Formula:</strong> {$data['Formula']}</p>";
        echo "<p><strong>Molecular Weight:</strong> {$data['MW']}</p>";
        echo "<p><strong>#Heavy atoms:</strong> {$data['#Heavy atoms']}</p>";
        echo "<p><strong>#Aromatic heavy atoms:</strong> {$data['#Aromatic heavy atoms']}</p>";
        echo "<p><strong>Fraction Csp3:</strong> {$data['Fraction Csp3']}</p>";
        echo "<p><strong>#Rotatable bonds:</strong> {$data['#Rotatable bonds']}</p>";
        echo "<p><strong>#H-bond acceptors:</strong> {$data['#H-bond acceptors']}</p>";
        echo "<p><strong>#H-bond donors:</strong> {$data['#H-bond donors']}</p>";
        echo '</section>';

        echo '<section id="water-solubility" class="section" style="grid-row: 3;">';
        echo "<h2>Water Solubility</h2>";
        echo "<p><strong>ESOL Log S:</strong> {$data['ESOL Log S']}</p>";
        echo "<p><strong>ESOL Solubility (mg/ml):</strong> {$data['ESOL Solubility (mg/ml)']}</p>";
        echo "<p><strong>ESOL Solubility (mol/l):</strong> {$data['ESOL Solubility (mol/l)']}</p>";
        echo "<p><strong>ESOL Class:</strong> {$data['ESOL Class']}</p>";
        echo "<p><strong>Ali Log S:</strong> {$data['Ali Log S']}</p>";
        echo "<p><strong>Ali Solubility (mg/ml):</strong> {$data['Ali Solubility (mg/ml)']}</p>";
        echo "<p><strong>Ali Solubility (mol/l):</strong> {$data['Ali Solubility (mol/l)']}</p>";
        echo "<p><strong>Ali Class:</strong> {$data['Ali Class']}</p>";
        echo "<p><strong>Silicos-IT LogSw:</strong> {$data['Silicos-IT LogSw']}</p>";
        echo "<p><strong>Silicos-IT Solubility (mg/ml):</strong> {$data['Silicos-IT Solubility (mg/ml)']}</p>";
        echo "<p><strong>Silicos-IT Solubility (mol/l):</strong> {$data['Silicos-IT Solubility (mol/l)']}</p>";
        echo "<p><strong>Silicos-IT class:</strong> {$data['Silicos-IT class']}</p>";
        echo '</section>';

        echo '<section id="druglikeness" class="section" style="grid-row: 4;">';
        echo "<h2>Druglikeness</h2>";
        echo "<p><strong>Lipinski #violations:</strong> {$data['Lipinski #violations']}</p>";
        echo "<p><strong>Ghose #violations:</strong> {$data['Ghose #violations']}</p>";
        echo "<p><strong>Veber #violations:</strong> {$data['Veber #violations']}</p>";
        echo "<p><strong>Egan #violations:</strong> {$data['Egan #violations']}</p>";
        echo "<p><strong>Muegge #violations:</strong> {$data['Muegge #violations']}</p>";
        echo "<p><strong>Bioavailability Score:</strong> {$data['Bioavailability Score']}</p>";
        echo '</section>';

        // Right side sections
        echo '<section id="structure-image" class="section" style="grid-row: 1; grid-column: 2;">';
        echo "<h2>Structure Image</h2>";
        echo '<div id="3dviewer" style="width: 300px; height: 300px;"></div>';
        echo '</section>';

        // Pass the PubChem ID to JavaScript
        echo "<script>
                let pubchemId = '{$pubchem_id}';
            </script>";

        echo '<section id="lipophilicity" class="section" style="grid-row: 2; grid-column: 2;">';
        echo "<h2>Lipophilicity</h2>";
        echo "<p><strong>iLOGP:</strong> {$data['iLOGP']}</p>";
        echo "<p><strong>XLOGP3:</strong> {$data['XLOGP3']}</p>";
        echo "<p><strong>WLOGP:</strong> {$data['WLOGP']}</p>";
        echo "<p><strong>MLOGP:</strong> {$data['MLOGP']}</p>";
        echo "<p><strong>Silicos-IT Log P:</strong> {$data['Silicos-IT Log P']}</p>";
        echo "<p><strong>Consensus Log P:</strong> {$data['Consensus Log P']}</p>";
        echo '</section>';

        echo '<section id="pharmacokinetics" class="section" style="grid-row: 3; grid-column: 2;">';
        echo "<h2>Pharmacokinetics</h2>";
        echo "<p><strong>GI absorption:</strong> {$data['GI absorption']}</p>";
        echo "<p><strong>BBB permeant:</strong> {$data['BBB permeant']}</p>";
        echo "<p><strong>Pgp substrate:</strong> {$data['Pgp substrate']}</p>";
        echo "<p><strong>CYP1A2 inhibitor:</strong> {$data['CYP1A2 inhibitor']}</p>";
        echo "<p><strong>CYP2C19 inhibitor:</strong> {$data['CYP2C19 inhibitor']}</p>";
        echo "<p><strong>CYP2C9 inhibitor:</strong> {$data['CYP2C9 inhibitor']}</p>";
        echo "<p><strong>CYP2D6 inhibitor:</strong> {$data['CYP2D6 inhibitor']}</p>";
        echo "<p><strong>CYP3A4 inhibitor:</strong> {$data['CYP3A4 inhibitor']}</p>";
        echo "<p><strong>log Kp (cm/s):</strong> {$data['log Kp (cm/s)']}</p>";
        echo '</section>';

        echo '<section id="medicinal-chemistry" class="section" style="grid-row: 4; grid-column: 2;">';
        echo "<h2>Medicinal Chemistry</h2>";
        echo "<p><strong>PAINS #alerts:</strong> {$data['PAINS #alerts']}</p>";
        echo "<p><strong>Brenk #alerts:</strong> {$data['Brenk #alerts']}</p>";
        echo "<p><strong>Leadlikeness #violations:</strong> {$data['Leadlikeness #violations']}</p>";
        echo "<p><strong>Synthetic Accessibility:</strong> {$data['Synthetic Accessibility']}</p>";
        echo '</section>';

        echo '</div>'; // Close inner-grid-container
    } else {
        echo "<h1>Data Not Found</h1>";
    }
} else {
    echo "<h1>No PubChem ID Provided</h1>";
}
    ?>
    <div><button class="scroll-to-top" onclick="scrollToTop()" id="scrollToTopBtn">Top</button></div>
</div>
    <div class="footer footer2"><p>© 2024 ChemViewer. All rights reserved.</p>
</div>

<script>
    function scrollToElement(elementId) {
        var element = document.getElementById(elementId);
        if (element) {
            element.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    }

   /* document.addEventListener('DOMContentLoaded', function() {
        var coll = document.querySelectorAll('.panel-heading');
        coll.forEach(function (heading) {
            heading.addEventListener('click', function () {
                this.classList.toggle('collapsed');
                var content = this.nextElementSibling.querySelector('.collapse');
                if (content.style.display === 'block') {
                    content.style.display = 'none';
                } else {
                    content.style.display = 'block';
                }
            });
        });
    }); */
</script>

<script>
    window.onscroll = function() {
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            scrollToTopBtn.classList.add("show");
        } else {
            scrollToTopBtn.classList.remove("show");
        }
    };

    // Scroll back to the top when the button is clicked
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>

<script>

document.addEventListener("DOMContentLoaded", function() {
    const sidebarButtons = document.querySelectorAll('.right-sidebar .nav-button');

    // Function to handle scrolling and highlighting
    function scrollToElement(id) {
        const element = document.getElementById(id);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
            highlightMenuItem(id);
        }
    }

    // Function to highlight active menu item
    function highlightMenuItem(id) {
        sidebarButtons.forEach(button => {
            if (button.id === `nav-${id}`) {
                button.classList.add('active');
            } else {
                button.classList.remove('active');
            }
        });
    }

    // Attach click event listeners to sidebar buttons
    sidebarButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = button.id.replace('nav-', '');
            scrollToElement(id);
        });
    });

    // Intersection Observer to track sections entering viewport
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.id;
                highlightMenuItem(id);
            }
        });
    }, { threshold: 0.5 }); // Adjust threshold as needed

    // Observe each section
    const sections = document.querySelectorAll('.section[id]');
    sections.forEach(section => {
        observer.observe(section);
    });
});

    </script>
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

</body>
</html>
