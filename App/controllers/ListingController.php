<?php

namespace App\Controllers;

use Error;
use Framework\Database;
use Framework\Validation;
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
        \inspectAndDie(Validation::match('test1', 'test'));

        $listings = $this->db->query("SELECT * FROM listings ")->fetchAll(PDO::FETCH_OBJ);


        loadView('listings/index', ['listings' => $listings]);
    }

    public function create()
    {
        loadView('listings/create');
    }

    public function show($params)
    {
        $id = $params['id'] ?? '';

        $params = ['id' => $id];

        $listing = $this->db->query("SELECT * FROM listings WHERE id = :id", ['id' => $id])->fetch();

        if (!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        loadView('listings/show', ['listing' => $listing]);
    }
}
