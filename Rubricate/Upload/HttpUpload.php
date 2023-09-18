<?php

declare(strict_types=1);

namespace Rubricate\Upload;

class HttpUpload implements IHttpUpload
{
    private $path;
    private $file;
    private $fileName;
    private $isMove   = false;
    private $validKey = array(
        'name', 'tmp_name', 'type',
        'error', 'size'
    );

    public function __construct(
        IRequestFilesUpload $file,
        IGetPathUpload $path
    ) {
        $this->path     = $path->getPath();
        $this->file     = $file->getFiles();
        $this->fileName = $this->file['name'];
    }

    public function setFileName($name): object
    {
        $fn = self::getFile('name');
        $ex = pathinfo($fn, PATHINFO_EXTENSION);

        $this->fileName = $name . '.' . $ex;

        return $this;
    }

    public function getFile($key): string
    {
        $key = strtolower($key);

        if (!in_array($key, $this->validKey)) {
            throw new \Exception(self::getMessageException($key));
        }

        if ($key !== 'name') {
            return $this->file[$key];
        }

        return $this->fileName;
    }

    public function getPath()
    {
        return $this->path;
    }

    private function getMessageException($key)
    {
        return sprintf(
            ''
            . 'Key "%s" invalid. '
            . 'Use the key: %s'
            .  PHP_EOL,
            $key,
            implode(',', $this->validKey)
        );
    }
}

