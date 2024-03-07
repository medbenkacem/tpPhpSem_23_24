<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul du score de recrutement</title>
</head>
<body>

<?php
// Définition des points pour chaque critère
$points_experience = [
    "Moins de 2 ans" => 10,
    "De 2 à 5 ans" => 20,
    "Plus de 5 ans" => 30
];

$points_competences = [
    "Débutant" => 10,
    "Intermédiaire" => 20,
    "Avancé" => 30
];

$points_education = [
    "Secondaire" => 10,
    "Baccalauréat" => 20,
    "Diplôme universitaire" => 30
];

$points_sport = [
    "Aucun sport" => 0,
    "Sport occasionnel" => 10,
    "Sport régulier" => 20,
    "Sport professionnel" => 30
];

$points_langues = [
    "Français" => 10,
    "Anglais" => 20,
    "Arabe" => 30
];

// Fonction pour calculer le score total
function calculerScore($experience, $competences, $education, $sport, $langues) {
    global $points_experience, $points_competences, $points_education, $points_sport, $points_langues;
    $score_total = $points_experience[$experience] + $points_competences[$competences] + $points_education[$education] + $points_sport[$sport];
    foreach ($langues as $langue) {
        $score_total += $points_langues[$langue];
    }
    return $score_total;
}

// Traitement lorsque le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $experience = $_POST['experience'];
    $competences = $_POST['competences'];
    $education = $_POST['education'];
    $sport = $_POST['sport'];
    $langues = isset($_POST['langues']) ? $_POST['langues'] : [];

    // Calculer le score total
    $score_total = calculerScore($experience, $competences, $education, $sport, $langues);

    // Afficher les informations sur le candidat et son score total
    echo "<h2>Informations sur le candidat :</h2>";
    echo "<p>Nom : $nom</p>";
    echo "<h2>Score de recrutement :</h2>";
    echo "<p>Le score de recrutement du candidat est : $score_total</p>";
}
?>

<!-- Formulaire pour saisir les informations du candidat -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nom">Nom du candidat :</label><br>
    <input type="text" id="nom" name="nom" required><br><br>

    <label>Expérience professionnelle :</label><br>
    <select name="experience">
        <option value="Moins de 2 ans">Moins de 2 ans</option>
        <option value="De 2 à 5 ans">De 2 à 5 ans</option>
        <option value="Plus de 5 ans">Plus de 5 ans</option>
    </select><br><br>

    <label>Compétences techniques :</label><br>
    <select name="competences">
        <option value="Débutant">Débutant</option>
        <option value="Intermédiaire">Intermédiaire</option>
        <option value="Avancé">Avancé</option>
    </select><br><br>

    <label>Niveau d'éducation :</label><br>
    <select name="education">
        <option value="Secondaire">Secondaire</option>
        <option value="Baccalauréat">Baccalauréat</option>
        <option value="Diplôme universitaire">Diplôme universitaire</option>
    </select><br><br>

    <label>Pratique sportive :</label><br>
    <input type="radio" name="sport" value="Aucun sport"> Aucun sport<br>
    <input type="radio" name="sport" value="Sport occasionnel"> Sport occasionnel<br>
    <input type="radio" name="sport" value="Sport régulier"> Sport régulier<br>
    <input type="radio" name="sport" value="Sport professionnel"> Sport professionnel<br><br>

    <label>Maîtrise des langues :</label><br>
    <input type="checkbox" name="langues[]" value="Français"> Français<br>
    <input type="checkbox" name="langues[]" value="Anglais"> Anglais<br>
    <input type="checkbox" name="langues[]" value="Arabe"> Arabe<br><br>

    <!-- Boutons pour calculer le score et réinitialiser le formulaire -->
    <input type="submit" value="Calculer le score">
    <input type="reset" value="Réinitialiser le formulaire">
</form>

</body>
</html>