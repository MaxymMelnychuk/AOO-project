<?php
require_once './app/utils/Render.php';

class UserController
{
 use Render;
 
   
    public function index(): void
    {
        session_start();

      
        // if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
        //     header("Location: /user/login");
        //     exit;
        // }

        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        $this->renderView('user/index', [
            'title' => 'Liste des utilisateurs',
            'users' => $users
        ], 'index');
    }


    public function register(): void
    {
        if ($_POST) {
            $userModel = new UserModel();
            $success = $userModel->createUser($_POST);

            if ($success) {
                header("Location: /user/login");
                exit;
            }

            $error = "Erreur lors de l'inscription.";
        }

        $this->renderView('user/register', [
            'error' => $error ?? null
        ], 'index');
    }

 
    public function login(): void
    {
        session_start();
        $error = null;

        if ($_POST) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->logUser($email, $password);

            if ($user) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                header("Location: /");
                exit;
            } else {
                $error = "Identifiants incorrects";
            }
        }

        $this->renderView('user/login', [
            'error' => $error
        ], 'index');
    }

 
    public function logout(): void
    {
        session_start();
        session_destroy();
        header("Location: /user/login");
        exit;
    }


        

    

   
}
