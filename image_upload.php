<?php

include 'conn.php';

// Define the base path
$base_path = "upload/";

// Array mapping compound names to their image filenames
$images = [
    "7-hydroxymitragynine" => "7-Hydroxymitragynine.png",
    "9-Hydroxycorynantheidine" => "9-O-Demethylmitragynine.png",
    "Ajmalicine" => "Ajmalicine.png",
    "Akuammigine" => "Akuammigine.png",
    "Akuammine" => "Akuammine.png",
    "Albuterol" => "Albuterol.png",
    "Corynantheidine" => "Corynantheidine.png",
    "Corynoxeine" => "Corynoxeine.png",
    "Corynoxine B" => "Corynoxine B.png",
    "Corynoxine" => "Corynoxine.png",
    "Epicatechin" => "Epicatechin.png",
    "Indole" => "Indole.png",
    "Isocorynoxeine" => "Isocorynoxeine.png",
    "Isomitraphylline" => "Isomitraphylline.png",
    "Isopteropodine" => "Isopteropodine.png",
    "Isorhynchophylline" => "Isorhynchophylline.png",
    "Isospeciofoline*" => "Isospeciofoline.png",
    "Mitraciliatine" => "Mitraciliatine.png",
    "Mitrafoline" => "Mitrafoline.png",
    "Mitragynine pseudoindoxyl" => "Mitragynine pseudoindoxyl.png",
    "Mitragynine" => "Mitragynine.png",
    "Mitraphylline" => "Mitraphylline.png",
    "N-methyl-D-aspartic acid" => "N-methyl-D-aspartic acid.png",
    "Oxindole" => "Oxindole.png",
    "Paynantheine" => "Paynantheine.png",
    "Pinoresinol" => "Pinoresinol.png",
    "Rhynchophylline" => "Rhynchophylline.png",
    "Speciociliatine" => "Speciociliatine.png",
    "Speciofoline" => "Speciofoline.png",
    "Speciogynine" => "Speciogynine.png",
    "Speciophylline" => "Speciophylline.png",
    "Stipulatine" => "Stipulatine.png",
    "Strictosidine" => "Strictosidine.png",
    "Tetrahydroalstonine" => "Tetrahydroalstonine.png"
];

// Update the image_compound column for each compound
foreach ($images as $name => $filename) {
    $image_path = $base_path . $filename;

    // Check if file exists
    if (!file_exists($image_path)) {
        echo "File not found: $image_path<br>";
        continue;
    }

    // Read the image file
    $image_data = file_get_contents($image_path);

    // Check if image data is successfully read
    if ($image_data === false) {
        echo "Error reading file: $image_path<br>";
        continue;
    }

    // Prepare the SQL statement
    $sql = "UPDATE adme_table SET image_compound = ? WHERE Name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error . "<br>";
        continue;
    }

    // Bind the parameters
    $stmt->bind_param("bs", $null, $name);

    // Send the image data as a long blob
    $stmt->send_long_data(0, $image_data);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Uploaded $filename for $name<br>";
    } else {
        echo "Error uploading $filename for $name: " . $stmt->error . "<br>";
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
