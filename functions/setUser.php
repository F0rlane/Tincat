<?php
// Etape 1 : config database
$DB_HOST = "localhost";
$DB_NAME = "tincat";
$DB_USER = "root";
$DB_PASSWORD = "";

// Etape 2 : Connexion to database
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
var_dump($_POST);
// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide
    // Ajouter un input confirm password et vérifier si les deux sont égaux
    // Ajouter un champ email

//Vérification que tout les champs sont bien complétés
if(empty($_POST["pseudo"])){
    header("Location: ../login.php?message=Veuillez renseigner un pseudo");
    die();
}else if(empty($_POST["password"])){
    header("Location: ../login.php?message=Veuillez renseigner un mot de passe");
    die();
}else if(empty($_POST["email"])){
    header("Location: ../login.php?message=Veuillez renseigner une adresse e-mail");
    die();
}else if(empty($_POST["confirm_password"])){
    header("Location: ../login.php?message=Veuillez renseigner le champ confirmer le mot de passe");
    die();
}else if($_POST["confirm_password"] != $_POST["password"]){
    header("Location: ../login.php?message=les mots de passe doivent correspondre");
    die();
}

// Etape 3 : prepare request
$req = $db->prepare("INSERT INTO users (email, pseudo, password) VALUES(:email, :pseudo, :password)");
$req->bindParam(":email", $_POST["email"]);
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $_POST["password"]);

// Etape 4 : execute request
$req->execute();

// Etape 5 : redirect to login page
header("Location: ../login.php?message=Votre compte a bien été créer");