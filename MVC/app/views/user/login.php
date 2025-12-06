<?php
    

    

    var_dump($_SESSION);

    var_dump(session_id());
var_dump($_SESSION);


?>

<footer>
    <h1>Login</h1>
    <form action="" method="POST">
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit">Sumbit</button>
    </form>

    <?php if(isset($error)): ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>
 </footer>