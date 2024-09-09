<?php

require 'vendor/autoload.php';

use App\SQLiteConnection as SQLiteConnection;
use App\SQLiteBLOB as SQLiteBlob;

$sqlite = new SQLiteBlob((new SQLiteConnection)->connect());

// insert a PDF file into the documents table
$pathToPDFFile = 'arquives/documents/sqlite-diagram.pdf';
$pdfId = $sqlite->insertDoc('application/pdf', $pathToPDFFile);

// insert a PNG file into the documents table
$pathToPNGFile = 'arquives/documents/schema.png';
$pngId = $sqlite->insertDoc('image/png', $pathToPNGFile);