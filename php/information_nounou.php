<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données (à remplacer par vos propres informations de connexion)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "garderie";

    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Récupération des données du formulaire
    $type_garde = $_POST['type_garde'];
    $experience = $_POST['experience'];
    $disponibilite = $_POST['disponibilite'];
    $age_enfants = $_POST['ageEnfant'];
    $taches_supplementaires = $_POST['taches'];
    $langues = $_POST['langues'];
    $niveau_etude = $_POST['niveau_étude'];
    $debut_garde = $_POST['debut_de_garde'];
    $fin_garde = $_POST['fin_de_garde'];
    $lieu_garde = $_POST['lieu de garde'];
    $prix = $_POST['prix'];
    $emploi_temps = $_POST['emploi du temps'];
    $annonce = $_POST['annonce'];
    $preferences_contact = $_POST['contact'];
    $numero_email = $_POST['numeroEmail'];

    // Requête SQL d'insertion
    $sql = "INSERT INTO annonces_nounou (type_garde, experience, disponibilite, age_enfants, taches_supplementaires, langues, niveau_etude, debut_garde, fin_garde, lieu_garde, prix, emploi_temps, annonce, preferences_contact, numero_email) VALUES ('$type_garde', '$experience', '$disponibilite', '$age_enfants', '$taches_supplementaires', '$langues', '$niveau_etude', '$debut_garde', '$fin_garde', '$lieu_garde', '$prix', '$emploi_temps', '$annonce', '$preferences_contact', '$numero_email')";

    // Exécution de la requête
    if ($conn->query($sql) === TRUE) {
        echo "Les données ont été insérées avec succès.";
    } else {
        echo "Erreur lors de l'insertion des données : " . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
}
?>
