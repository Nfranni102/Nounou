<?php
// Connexion à la base de données
$servername= "localhost";
$username= "root";
$password=  "";
$dbname= "garderie";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

// Récupération des données du formulaire et échappement
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$mot_de_passe = mysqli_real_escape_string($conn, $_POST["mot_de_passe"]);

// Requête pour récupérer le mot de passe hashé de l'utilisateur
$stmt = $conn->prepare("SELECT mot_de_passe FROM utilisateur_nounou WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($mot_de_passe_hash);
$stmt->fetch();

// Vérification du mot de passe
if (password_verify($mot_de_passe, $mot_de_passe_hash)) {
    echo "Connexion réussie";
} else {
    echo "Email ou mot de passe incorrect.";
}

// Fermeture de la connexion
$stmt->close();
$conn->close();
?>
