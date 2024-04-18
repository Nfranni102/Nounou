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
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];
// Nom du fichier
$photo_name = $_FILES['photo']['name'];
// Emplacement temporaire du fichier
$photo_tmp = $_FILES['photo']['tmp_name'];

// Hachage du mot de passe
$mot_de_passe_hash = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

// Déplacer le fichier téléchargé vers le dossier de destination
$photo_destination = 'chemin/vers/le/dossier/destination/' . $photo_name;
move_uploaded_file($photo_tmp, $photo_destination);

// Requête SQL pour insérer les données dans la base de données
$sql = "INSERT INTO utilisateur_parent (nom, prenom, email, mot_de_passe, ville, pays, photo) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe', '$ville', '$pays', '$photo_destination')";

if ($conn->query($sql) === TRUE) {
    echo "Enregistrement réussi";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Redirection vers la page information_nounou.html
header("Location: ../html/information_parent.html");
exit;

// Fermeture de la connexion à la base de données
$conn->close();

?>
