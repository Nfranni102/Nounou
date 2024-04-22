<?php
session_start(); // Démarrer la session

// Vérifiez si l'utilisateur est connecté, sinon redirigez vers la page de connexion
if (!isset($_SESSION['id_parent'])) {
    header('Location: /html/login_parent.html');
    exit();
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "garderie";
$id_parent = $_SESSION['id_parent']; // L'ID de l'utilisateur connecté

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Échec de la connexion: " . $conn->connect_error);
}

// Requête SQL pour obtenir les informations de l'utilisateur connecté
$sql = "SELECT ville, nom, prenom, pays, email FROM utilisateur_parent WHERE id_parent = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_parent);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // Afficher les informations de l'utilisateur
  $row = $result->fetch_assoc();
  echo "Ville: " . $row["ville"] . "<br>";
  echo "Nom: " . $row["nom"] . "<br>";
  echo "Prénom: " . $row["prenom"] . "<br>";
  echo "Pays: " . $row["pays"] . "<br>";
  echo "Email: " . $row["email"] . "<br>";
} else {
  echo "Aucune information disponible pour l'utilisateur.";
}
$conn->close();
?>
