<?php
use App\SQLiteConnection as SQLiteConnection;
use App\SQLiteInsert as SQLiteInsert;

$pdo = (new SQLiteConnection())->connect();

$sqlite = new SQLiteInsert($pdo);

$sqlite->insertProduct('Produto teste');
$sqlite->insertProject('Prepare the sample database schema');
$sqlite->insertTask('Create new tables ');