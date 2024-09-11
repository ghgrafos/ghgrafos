<?php

require './vendor/autoload.php';
use App\SQLiteConnection as SQLiteConnection;
use App\SQLiteBLOB as SQLiteBlob;

$pdo = (new SQLiteConnection)->connect();
$sqlite = new SQLiteBlob($pdo);

$documentId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if ($documentId === null) {
    die('ID do documento inválido');
}

$doc = $sqlite->readDoc($documentId);
if ($doc != null) {
    header("Content-Type:" . $doc['mime_type']);
    echo $doc['doc'];
} else {
    echo 'Erro ao carregar o documento ' . $documentId;
}

