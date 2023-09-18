<?php

declare(strict_types=1);

namespace Rubricate\Upload;

class WidthUpload implements IGetSizeUpload
{
    private $size;

    public function __construct($size)
    {
        self::setSize($size);
    }

    public function setSize($size): object
    {
        if ((int) $size < 1) {
            throw new \Exception('invalid widht');
        }

        $this->size = (int) $size;

        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}

