<?php

/*
 *
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/rubricate/upload 
 * @copyright   2013 - 2017
 * 
 */

namespace Rubricate\Upload;

class FileUpload implements IFileUpload
{
    private $path;
    private $file; 
    private $fileName;
    private $isMove   = FALSE;
    private $validKey = array(
        'name', 
        'tmp_name', 
        'type', 
        'error', 
        'size'
    );





    public function __construct($filesKey, $path)
    {
        $this->path     = $path;
        $this->file     = $filesKey;
        $this->fileName = $this->file['name'];
    }




    public function setFileName($name)
    {

        $ex = pathinfo( 
            self::getFile('name'),
            PATHINFO_EXTENSION
        );

        $this->fileName = $name . '.' . $ex;

        return $this;
    }





    public function getFile($key)
    {
        $key = strtolower($key);

        self::keyException($key);

        if($key !== 'name')
        {
            return $this->file[$key];
        }

        return $this->fileName;
    } 





    public function getPath()
    {
        return $this->path;
    }





    public function moveFile() 
    {
        $tmpName  = self::getFile('tmp_name');
        $pathFile = $this->path . self::getFile('name');
        $move     = move_uploaded_file($tmpName, $pathFile);

        $this->isMove = (bool) $move;

        return $this;

    }





    public function isMove()
    {
        return $this->isMove;
    } 
    





    private function keyException($key)
    {
        $str = ''
            . 'Key "%s" invalid. '
            . 'Use the key: %s'
            .  PHP_EOL;

        if(!in_array($key, $this->validKey))
        {
            throw new \Exception( 
                sprintf(
                    $str, $key, 
                    implode(', ', $this->validKey)
                ) 
            );
        }
    } 





}

