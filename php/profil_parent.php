<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "garderie";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Échec de la connexion: " . $conn->connect_error);
}

// Requête SQL pour obtenir les données de la table utilisateur_parent
$sql = "SELECT ville, nom, prenom, pays, email FROM utilisateur_parent";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Afficher les données de chaque ligne
  while($row = $result->fetch_assoc()) {
    echo "Ville: " . $row["ville"] . "<br>";
    echo "Nom: " . $row["nom"] . "<br>";
    echo "Prénom: " . $row["prenom"] . "<br>";
    echo "Pays: " . $row["pays"] . "<br>";
    echo "Email: " . $row["email"] . "<br><br>";
  }
} else {
  echo "Aucun résultat trouvé.";
}
$conn->close();
?>
