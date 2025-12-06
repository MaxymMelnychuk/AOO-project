<?php
echo "<h1>Liste des utilisateurs :</h1>";

if (isset($users) && count($users) > 0) {
    echo '<table border="1" cellpadding="10">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Prénom</th>';
    echo '<th>Nom</th>';
    echo '<th>Email</th>';
    echo '<th>Rôle</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($user['id']) . '</td>';
        echo '<td>' . htmlspecialchars($user['prenom']) . '</td>';
        echo '<td>' . htmlspecialchars($user['nom']) . '</td>';
        echo '<td>' . htmlspecialchars($user['email']) . '</td>';
        echo '<td>' . htmlspecialchars($user['role']) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>Aucun utilisateur trouvé</p>';
}
?>

