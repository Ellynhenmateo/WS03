<?php

namespace App\Controllers;

use Framework\Database;
use PDO;


class ListingController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');

        $this->db = new Database($config);
    }

    public function index()
    {

        $listings = $this->db->query("SELECT * FROM listings ")->fetchAll(PDO::FETCH_OBJ);


        loadView('listings/index', ['listings' => $listings]);
    }

    public function create()
    {
        loadView('listings/create');
    }

    public function show()
    {
        $id = $_GET['id'] ?? '';
        $params = ['id' => $id];

        $listing = $this->db->query("SELECT * FROM listings WHERE id = :id", $params)->fetch();

        if (!$listing) {
            http_response_code(404);
            loadView('error/404');
            exit;
        }

        loadView('listings/show', ['listing' => $listing]);
    }
}
