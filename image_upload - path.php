<?php

include 'conn.php';

// Define the base path (relative to the root of the website)
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

// Update the image_blob column for each compound
foreach ($images as $name => $filename) {
    $image_path = $base_path . $filename;

    // Update the image_blob column with the relative path
    $sql = "UPDATE adme_table SET image_blob = ? WHERE Name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error . "<br>";
        continue;
    }
    
    $stmt->bind_param("ss", $image_path, $name);

    if ($stmt->execute()) {
        echo "Uploaded path $image_path for $name<br>";
    } else {
        echo "Error uploading path $image_path for $name: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>
