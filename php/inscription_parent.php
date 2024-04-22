<?php 

// Connexion a la base de données
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


// Récuperation de la connexion
$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mot_de_passe = mysqli_real_escape_string($conn, $_POST['mot_de_passe']);
$ville = mysqli_real_escape_string($conn, $_POST['ville']);
$pays = mysqli_real_escape_string($conn, $_POST['pays']);


// Hashage du mot de passe
$mot_de_passe_hash =  password_hash($mot_de_passe, PASSWORD_DEFAULT);


// Préparation de la requete SQL
$stmt = $conn->prepare("INSERT INTO utilisateur_parent (nom,prenom, email, mot_de_passe, ville, pays) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nom, $prenom, $email, $mot_de_passe_hash, $ville, $pays);


// Exécution de la requete
if ($stmt->execute()) {
    echo "Inscription réussie!";
} else{
    echo "Erreur lors de l'inscription.";
}

// Lien pour redirigers l'utilisateur vers un autre lien
header("Location: ../html/information_parent.html");
exit;



// Fermeture de la connexion
$stmt->close();
$conn->close();
?>