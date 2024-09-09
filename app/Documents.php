<?php
namespace App;
// app/Documents.php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'documents')]
class Documents
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $document_id = null;
    #[ORM\Column(type: 'string')]
    private string $mime_type;
    #[ORM\Column(type: 'string')]
    private string $doc;
}