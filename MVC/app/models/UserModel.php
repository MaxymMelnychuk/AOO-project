<?php

class UserModel extends Bdd
{
    // Initialise la connexion DB depuis la classe parente
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Authentifie un utilisateur via email + mot de passe.
     */
    public function logUser(string $email, string $motdepasse): array
    {
        $stmt = $this->co->prepare(
            'SELECT *
             FROM users
             WHERE email = :email'
        );

        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification du hash du mot de passe
        if ($user && password_verify($motdepasse, $user['motdepasse'])) {
            return $user;
        }

        return [];
    }

    /**
     * Crée un utilisateur (mot de passe hashé).
     */
    public function createUser(array $data): bool
    {
        $stmt = $this->co->prepare(
            'INSERT INTO users (prenom, nom, email, motdepasse, role)
             VALUES (:prenom, :nom, :email, :motdepasse, :role)'
        );

        return $stmt->execute([
            'prenom'      => $data['prenom'],
            'nom'         => $data['nom'],
            'email'       => $data['email'],
            'motdepasse'  => password_hash($data['motdepasse'], PASSWORD_DEFAULT),
            'role'        => $data['role'] ?? 'user'
        ]);
    }

    /**
     * Retourne la liste complète des utilisateurs.
     */
    public function getAllUsers(): array
    {
        $stmt = $this->co->prepare(
            'SELECT *
             FROM users'
        );

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
