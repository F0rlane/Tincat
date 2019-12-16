<?php
//Connection à la base de données
require "database.php";

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
}

// Etape 3 : prepare request
$req = $db->prepare("SELECT * FROM users WHERE email = :email AND pseudo = :pseudo AND password = :password");
$req->bindParam(":email", $_POST["email"]);
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $_POST["password"]);

// Etape 4 : execute request
$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);

var_dump($result);

// Etape 5 : Redirection
//If si on trouve l'utilisateur ou pas -> le connecté ou affiché un message d'erreur
if($result == false){
    header("Location: ../login.php?message=L'utilisateur n'existe pas");
}else{
    session_start();
    $_SESSION["email"] = $result["email"];
    $_SESSION["pseudo"] = $result["pseudo"];
    $_SESSION["password"] = $result["password"];
    header("Location: ../profile.php");
}