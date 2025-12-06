<h1>Inscription</h1>

<?php if (isset($error)): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="/user/register" method="POST">
    <div>
        <label for="prenom">Prénom :</label><br>
        <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
    </div>
    
    <div>
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
    </div>
    
    <div>
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" placeholder="votre@email.com" required>
    </div>
    
    <div>
        <label for="motdepasse">Mot de passe :</label><br>
        <input type="password" id="motdepasse" name="motdepasse" placeholder="Votre mot de passe" required>
    </div>
    
    <button type="submit">S'inscrire</button>
</form>

<p><a href="/user/login">Déjà un compte ? Connectez-vous</a></p>
