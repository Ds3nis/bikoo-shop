<?php

namespace App\Kernel\Http;

use App\Kernel\Upload\UploadedFile;
use App\Kernel\Upload\UploadedFileInterface;
use App\Kernel\Validator\Validator;
use App\Kernel\Validator\ValidatorInterface;

class Request implements RequestInterface
{

    private ValidatorInterface $validator;
    public function __construct(public readonly array $get, public readonly array $post, public readonly array $server, public readonly array $files, public readonly array $cookies){

    }

    public static function createFromGlobals(){

        return new static(
            $_GET,
            $_POST,
            $_SERVER,
            $_FILES,
            $_COOKIE,
        );
    }



    /**
     * @param Validator $validator
     * @return void
     */
    public function setValidator(ValidatorInterface|\App\Kernel\Http\Validator $validator) : void{
        $this->validator = $validator;
    }

    public function validate(array $rules) : bool{
        $data =  [];
        foreach ($rules as $field=>$rule){
            $data[$field] = $this->input($field);
        }

        return $this->validator->validate($data, $rules);
    }

    public function getMethod(){
        return $_SERVER["REQUEST_METHOD"];
    }

    public function file($key): ?array
    {
        if (isset($this->files[$key])){
            $uploadedArray = [];
            $fileArray = $this->files[$key];
        foreach ($fileArray['name'] as $index => $fileName) {
            $fileSize = $fileArray['size'][$index];
            $fileFullPath = $fileArray['full_path'][$index];
            $fileTmpName = $fileArray['tmp_name'][$index];
            $fileType = $fileArray['type'][$index];
            $fileError = $fileArray['error'][$index];

            $uploadedFile = new UploadedFile(
                $fileName,
                $fileFullPath,
                $fileType,
                $fileTmpName,
                $fileError,
                $fileSize,
            );
            array_push($uploadedArray, $uploadedFile);
        }
        return $uploadedArray;
        }else{
            return null;
        }
    }

    public function input(string $param, $default = null){
        return $this->post[$param] ?? $this->get[$param] ?? $this->files[$param] ?? $default;
    }

    public function getUri(){
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function errors() : array{
        return $this->validator->errors();
    }
}