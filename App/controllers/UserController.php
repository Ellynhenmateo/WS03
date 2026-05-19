<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class UserController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');

        $this->db = new Database($config);
    }


    /**Show Create Page
     * 
     * @return void
     * 
     * */

    public function create()
    {
        loadView('users/create');
    }
    /**
     * Store user to db
     * 
     * @return void
     */

    public function store()
    {

        $name = sanitize($_POST['name'] ?? '');
        $email = sanitize($_POST['email'] ?? '');
        $city = sanitize($_POST['city'] ?? '');
        $state = sanitize($_POST['state'] ?? '');
        $password = $_POST['password'] ?? '';
        $password_confirmation = $_POST['password_confirmation'] ?? '';

        $formData = [
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state
        ];

        $errors = [];
        // Validation
        if (!Validation::email($email)) {
            $errors[] = "Invalid email format.";
        }

        if (!Validation::string($name, 2, 50)) {
            $errors[] = "Name must be between 2 and 50 characters.";
        }

        if (!Validation::string($password, 6, 50)) {
            $errors[] = "Password must be at least 6 characters long.";
        }

        if (!Validation::match($password, $password_confirmation)) {
            $errors[] = "Password does not match.";
        }


        if (!empty($errors)) {
            \loadView('users/create', [
                'errors' => $errors,
                'user' => $formData
            ]);
            exit;
        }

        //check if email exists
        $params = [
            'email' => $email
        ];

        $user = $this->db->query("SELECT * FROM users WHERE email = :email", $params)->fetch();

        if ($user) {
            $errors['email'] = "Email already exists.";
            \loadView('users/create', [
                'errors' => $errors,
                'user' => $formData
            ]);
            exit;
        }

        $params = [
           'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

    

        $this->db->query(
            "INSERT INTO users (name, email, city, state, password) VALUES (:name, :email, :city, :state, :password)",
            $params
        );
    

        $_SESSION['success_message'] = 'Registration successful. You can now log in.';
        redirect('/auth/login');
    }

    /**Show login Page
     * 
     * @return void
     * 
     *
     */

    public function login()
    {
        loadView('users/login');
    }
}