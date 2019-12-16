<?php require "head.php"; ?>
<body>
<div class="form-container">
        <h1>TINCAT</h1>
        <form action="functions/loginAction.php" method="post">
            <input type="email" placeholder="e-mail" name="email">
            <input type="text" placeholder="pseudo" name="pseudo">
            <input type="password" placeholder="password" name="password">
            <input type="submit" value="Connexion">
        </form>
        <a href="register.php">Pas de compte ? Inscrivez-vous !</a>
        <div class="alert-box">
        <?php
        if(isset($_GET["message"])){
            echo $_GET["message"];
        }
        ?>
        </div>
    </div>
</body>