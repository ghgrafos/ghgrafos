<?php
require 'vendor/autoload.php';

use App\SQLiteConnection as SQLiteConnection;
use App\SQLiteTableList as SQLiteTableList;

$pdo = (new SQLiteConnection)->connect();

$sqlite = new SQLiteTableList((new SQLiteConnection())->connect());

// get the table list
$tables = $sqlite->getTableList();

$products = $sqlite->getProductsList();

$projects = $sqlite->getProjectsList();

$tasks = $sqlite->getTasksList();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="sqlitetutorial.net">
        <title>GHRAFOS: Dashboard</title>
        <link href="public/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Dashboard</h1>
            </div>

            <table class="table table-bordered">
            <thead>
                    <tr>
                        <th>Products</th>
                        <th>id</th>
                        <th>name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td>table</td>
                            <td><?php echo $product->id; ?></td>
                            <td><?php echo $product->name; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <thead>
                    <tr>
                        <th>Projetos</th>
                        <th>id</th>
                        <th>name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $project) : ?>
                        <tr>
                            <td>table</td>
                            <td><?php echo $project->id; ?></td>
                            <td><?php echo $project->name; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <thead>
                    <tr>
                        <th>Tasks</th>
                        <th>id</th>
                        <th>name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task) : ?>
                        <tr>
                            <td>table</td>
                            <td><?php echo $task->id; ?></td>
                            <td><?php echo $task->name; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>