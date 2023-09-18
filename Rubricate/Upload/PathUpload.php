<?php

declare(strict_types=1);

namespace Rubricate\Upload;

class PathUpload implements IGetPathUpload
{
    private $path;
    
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return  $this->path;
    }
}

