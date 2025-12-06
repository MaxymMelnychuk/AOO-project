<?php
class UserModel extends Bdd
{

 public function __construct()
 {
  parent::__construct();
 }

 public function logUser(string $email, string $motdepasse): array {
    $stmt = $this->co->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($motdepasse, $user['motdepasse'])) {
        return $user;
    }
    return [];
}

public function createUser(array $data): bool {
    $stmt = $this->co->prepare('INSERT INTO users (prenom, nom, email, motdepasse, role) VALUES (:prenom,:nom,:email,:motdepasse,:role)');
    return $stmt->execute([
        'prenom' => $data['prenom'],
        'nom' => $data['nom'],
        'email' => $data['email'],
        'motdepasse' => password_hash($data['motdepasse'], PASSWORD_DEFAULT),
        'role' => $data['role'] ?? 'user'
    ]);
}

public function getAllUsers(): array {
    $stmt = $this->co->prepare('SELECT * FROM users');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
