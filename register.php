<?php require "head.php"; ?>

<body>
    <div class="form-container">
        <h1>TINCAT</h1>
        <form action="functions/setUser.php" method="post">
            <input type="email" placeholder="e-mail" name="email">
            <input type="text" placeholder="pseudo" name="pseudo">
            <input type="password" placeholder="password" name="password">
            <input type="password" placeholder="confirm_password" name="confirm_password">
            <input type="submit" value="register">
        </form>
    </div>
</body>
</html>
