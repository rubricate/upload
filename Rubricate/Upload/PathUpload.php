<?php

namespace Rubricate\Upload;

class PathUpload implements IGetPathUpload
{
    private $path;
    
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return  $this->path;
    }
}

