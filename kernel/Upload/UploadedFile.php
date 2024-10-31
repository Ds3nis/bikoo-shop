<?php

namespace App\Kernel\Upload;

class UploadedFile implements UploadedFileInterface
{

    public function __construct(
        private $name,
        private $full_path,
        private $type,
        private $tmpName,
        private $error,
        private $size,
    ){

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getFullPath()
    {
        return $this->full_path;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getTmpName()
    {
        return $this->tmpName;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    public function move(string $path, string $fileName = null): string|false
    {
        $storagePath = APP_PATH . "/public/assets/$path";


        if (!is_dir($storagePath)){
            mkdir($storagePath, 0777, true);
        }

        $fileName = $fileName ?? $this->randomFileName();

        $filePath = "$storagePath/$fileName.{$this->getExtension()}";

        if(move_uploaded_file($this->tmpName, $filePath)){
            return "assets/$path/$fileName";
        }

        return false;

    }

    private function randomFileName(){
        return md5(uniqid(rand(), true));
    }

    public function getExtension(): string
    {
        return pathinfo($this->name, PATHINFO_EXTENSION);
    }
}