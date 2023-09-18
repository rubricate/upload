<?php

declare(strict_types=1);

namespace Rubricate\Upload;

class RequestFilesUpload implements IRequestFilesUpload
{
    private $files;
    
    public function __construct($key)
    {
        if (!array_key_exists($key, $_FILES)) {
            throw new \Exception("Erro \$_FILES - key: {$key} not found. \n");
        }

        $this->files = $_FILES[$key];
    }

    public function getFiles(): string
    {
        return  $this->files;
    }
}

