<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "garderie";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form handling
$type_garde = $_POST['type_garde'];
$experience = $_POST['experience'];
$disponibilite = $_POST['disponibilite'];
$age_enfants = $_POST['ageEnfant'];
$allergies = $_POST['allergies'];
$taches_supplementaires = $_POST['taches'];
$langues = $_POST['langues'];
$niveau_etude = $_POST['niveau_étude'];
$debut_garde = $_POST['debut_de_garde'];
$fin_garde = $_POST['fin_de_garde'];
$lieu_garde = $_POST['lieu_de_garde'];
$prix = $_POST['prix'];
$emploi_temps = $_POST['emploi_du_temps'];
$annonce = $_POST['annonce'];
$preferences_contact = $_POST['contact'];
$numero_email = $_POST['numeroEmail'];

// Insert form data into the annonces_parents table
$stmt = $conn->prepare("INSERT INTO annonces_parents (type_garde, experience, disponibilite, age_enfants, allergies, taches_supplementaires, langues, niveau_etude, debut_garde, fin_garde, lieu_garde, prix, emploi_temps, annonce, preferences_contact, numero_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssssss",$type_garde, $experience, $disponibilite, $age_enfants, $allergies, $taches_supplementaires, $langues, $niveau_etude, $debut_garde, $fin_garde, $lieu_garde, $prix, $emploi_temps, $annonce, $preferences_contact, $numero_email);


$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Your request has been submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Lien pour redirigers l'utilisateur vers un autre lien
header("Location: ../html/profil_parent.html");
exit;
$stmt->close();
$conn->close();

?>