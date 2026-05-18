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
}