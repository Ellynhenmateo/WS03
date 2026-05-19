<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

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


        Session::setFlash('success_message', 'Registration successful. You are now logged in.');

        //get new user id
        $userId = $this->db->lastInsertId();

        Session::set('user', [
            'id' => $userId,
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state
        ]);
        redirect('/');
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

    public function logout()
    {
        Session::clearAll();
        redirect('/');
    }

    /** Authenticate a user with email and password 
     * @return void
     */

    /** Authenticate a user with email and password 
     * @return void
     */
    public function authenticate()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $errors = [];

        // Validation
        if (!Validation::email($email)) {
            $errors[] = "Please enter a valid email address.";
        }

        if (!Validation::string($password, 6, 50)) {
            $errors[] = "Password must be at least 6 characters long.";
        }

        if (!empty($errors)) {
            Session::clear('user');
            loadView('users/login', [
                'errors' => $errors,
                'user' => ['email' => $email]
            ]);
            exit;
        }

        // Check if user exists and password is correct
        $params = [
            'email' => $email
        ];

        $user = $this->db->query("SELECT * FROM users WHERE email = :email", $params)->fetch();

        // INAYOS: Binasa si $user['password'] bilang object property ($user->password)
        if (!$user || !password_verify($password, $user->password)) {
            Session::clear('user');
            $errors[] = "Invalid email or password.";
            loadView('users/login', [
                'errors' => $errors,
                'user' => ['email' => $email]
            ]);
            exit;
        }

        // Login successful - Nanatiling Object access (->) para swak sa framework
        Session::set('user', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'city' => $user->city,
            'state' => $user->state
        ]);

        redirect('/');
    }
}
