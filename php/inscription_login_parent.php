<?php
// Connexion a la base de donnees
$servername = "localhost";
$username="root";
$password = "";
$dbname = "garderie";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Verification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récuperation des données soumises par le formulaire

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST["email"];
$mot_de_passe = $_POST['mot_de_passe'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];
$photo = $_FILES['photo']['name'];


// Traitement de l'upload de la photo

$target_dir = "uploads/";
$target_file = $target_dir .basename($_FILES["photo"]["name"]);
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);


// Insertion des données dans la base de données

$sql = "INSERT INTO utilisateur_parent (nom, prenom, email, mot_de_passe, ville, pays, photo) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe', '$ville', '$pays', '$photo')";


if ($conn->query($sql) === TRUE) {
    echo "Nouvel utilisateur crée avec succée";
} else{
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}


// Fermeture de la connexion
$conn->close();

?>