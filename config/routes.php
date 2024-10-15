

<?php

use  App\Router\Route;
use App\Controllers\Home\IndexController;


    return [

        Route::get("/", [IndexController::class, "index"]),
        Route::get("/test",  [IndexController::class, "index"])
    ];