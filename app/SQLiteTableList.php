<?php
namespace App;

/**
 * SQLite Create Table Demo
 */
class SQLiteTableList {

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * connect to the SQLite database
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

        /**
     * get the table list in the database
     */
    public function getTableList() {

        $stmt = $this->pdo->query("SELECT name
                                   FROM sqlite_master
                                   WHERE type = 'table'
                                   ORDER BY name");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }

        return $tables;
    }

        /**
     * Get all projects
     * @return type
     */
    public function getProjectsList() {
        $stmt = $this->pdo->query('SELECT id, name '
                . 'FROM projects');

        $projects = [];
        while ($project = $stmt->fetchObject()) {
            $projects[] = $project;
        }

        return $projects;
    }

            /**
     * Get all tasks
     * @return type
     */
    public function getTasksList() {
        $stmt = $this->pdo->query('SELECT id, name '
                . 'FROM tasks');

        $tasks = [];
        while ($task = $stmt->fetchObject()) {
            $tasks[] = $task;
        }

        return $tasks;
    }

                /**
     * Get all tasks
     * @return type
     */
    public function getProductsList() {
        $stmt = $this->pdo->query('SELECT id, name '
                . 'FROM products');

        $products = [];
        while ($product = $stmt->fetchObject()) {
            $products[] = $product;
        }

        return $products;
    }
}