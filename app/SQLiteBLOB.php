<?php

declare(strict_types=1);

namespace App;

use App\SQLiteConnection;

/**
 * SQLite PHP Blob Demo
 */
class SQLiteBLOB
{

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Insert blob data into the documents table
     * @param type $pathToFile
     * @return type
     */
    public function insertDoc($mimeType, $pathToFile)
    {
        if (!file_exists($pathToFile)) {
            throw new \Exception("File $pathToFile not found.");
        }

        $sql = "INSERT INTO documents(mime_type, doc) "
            . "VALUES (:mime_type, :doc)";

        // read data from the file
        $fh = fopen($pathToFile, 'rb');

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':mime_type', $mimeType);
        $stmt->bindValue(':doc', $fh, \PDO::PARAM_LOB);
        $stmt->execute();

        fclose($fh);
    }

    /**
     * Read document from the documents table
     * @param type $documentId
     * @return type
     */
    public function readDoc($documentId)
    {
        $sql = "SELECT mime_type, doc "
            . "FROM documents "
            . "WHERE document_id = :document_id";

        // initialize the params
        $mimeType = null;
        $doc = null;
        //
        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute([":document_id" => $documentId])) {

            $stmt->bindColumn(1, $mimeType);
            $stmt->bindColumn(2, $doc, \PDO::PARAM_LOB);

            return $stmt->fetch(\PDO::FETCH_BOUND) ?
                [
                    "document_id" => $documentId,
                    "mime_type" => $mimeType,
                    "doc" => $doc
                ] : null;
        } else {
            return null;
        }
    }
}
