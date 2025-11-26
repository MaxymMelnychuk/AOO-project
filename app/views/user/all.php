<?php
echo "<h1>Liste des utilisateurs</h1>";
if (count($users) > 0) {
 foreach ($users as $user) {
  echo '<h2>' . $user->getEmail() . '</h2>';
 }
} else {
 echo '<p>Aucun utilisateur</p>';
}
