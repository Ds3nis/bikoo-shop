<?php

namespace App\Kernel\Config;

class Config implements ConfigInterface
{

    public function get(string $key, $default = null): mixed
    {
        [$file, $key] = explode('.', $key);

        $congigPath = APP_PATH ."/config/$file.php";

        if(! file_exists($congigPath)){
            return  $default;
        }else{
            $config = require $congigPath;
        }

        return $config[$key] ?? $default;
    }
}