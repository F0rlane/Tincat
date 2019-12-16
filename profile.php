<?php
require "functions/database.php";
require "head.php";
if(empty($_SESSION)){
    header("Location: login.php");
}
?>
<div class="home_user">
<?php
echo "<span>Bonjour " . $_SESSION["pseudo"] . "</span><br>";
?>
<a href="functions/disconnect.php">Deconnexion</a>
</div>
<div>
<!-- Affiché les utilisateurs stocké dans la bdd sauf moi -->
<?php
$req = $db->prepare("SELECT * FROM users");
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
echo(var_dump($result));
?>
</div>