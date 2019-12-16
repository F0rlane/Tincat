<?php require "head.php"; ?>
<body>
<div class="form-container">
        <h1>TINCAT</h1>
        <form action="functions/connectUser.php" method="post">
            <input type="email" placeholder="e-mail" name="email">
            <input type="text" placeholder="pseudo" name="pseudo">
            <input type="password" placeholder="password" name="password">
            <input type="submit" value="login">
        </form>
        <div class="alert-box"></div>
    </div>
</body>