<?php

namespace Rubricate\Upload;

class FileUpload implements IMoveFileUpload
{
    private $http;

    public function __construct(IHttpUpload $http)
    {
        $this->http = $http;
    }

    public function moveFile()
    {
        return
            move_uploaded_file(
                $this->http->getFile('tmp_name'),
                $this->http->getPath() . $this->http->getFile('name')
            );
    }
}

