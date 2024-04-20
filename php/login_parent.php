<?php
// Connexion à la base de données (à remplacer par vos propres informations de connexion)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "garderie";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Requête SQL pour vérifier les informations de connexion dans la base de données
$sql = "SELECT * FROM utilisateur_parent WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Utilisateur trouvé dans la base de données, vérification du mot de passe
    $row = $result->fetch_assoc();
    if (password_verify($mot_de_passe, $row['mot_de_passe'])) {
        // Mot de passe correct, connexion réussie
        // Redirection vers une autre page après la connexion
        header("Location: ../html/");
        exit;
    } else {
        // Mot de passe incorrect
        echo "Mot de passe incorrect";
    }
} else {
    // Utilisateur non trouvé dans la base de données
    echo "Utilisateur non trouvé";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
