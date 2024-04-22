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

// Requête pour obtenir les informations des utilisateurs
$sqlUtilisateurs = "SELECT nom, ville, pays, email FROM utilisateur_parent";
$resultUtilisateurs = $conn->query($sqlUtilisateurs);

// Requête pour obtenir les annonces
$sqlAnnonces = "SELECT annonce, prix, contact FROM annonces_parent";
$resultAnnonces = $conn->query($sqlAnnonces);

// Afficher les informations des utilisateurs
if ($resultUtilisateurs->num_rows > 0) {
  while($row = $resultUtilisateurs->fetch_assoc()) {
    echo "<div class='user-info'>";
    echo "<p>Nom: " . $row["nom"] . "</p>";
    echo "<p>Ville: " . $row["ville"] . "</p>";
    echo "<p>Pays: " . $row["pays"] . "</p>";
    echo "<p>Email: " . $row["email"] . "</p>";
    echo "</div>";
  }
} else {
  echo "Aucun utilisateur trouvé.";
}

// Afficher les annonces
if ($resultAnnonces->num_rows > 0) {
  while($row = $resultAnnonces->fetch_assoc()) {
    echo "<div class='annonce-info'>";
    echo "<p>Annonce: " . $row["annonce"] . "</p>";
    echo "<p>Prix: " . $row["prix"] . "</p>";
    echo "<p>Contact: " . $row["contact"] . "</p>";
    echo "</div>";
  }
} else {
  echo "Aucune annonce trouvée.";
}

// Fermer la connexion
$conn->close();
?>
