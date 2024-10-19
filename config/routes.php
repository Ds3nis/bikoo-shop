

<?php

use App\Controllers\Home\IndexController;
use App\Controllers\User\Registration\StoreRegistrationController;
use App\Kernel\Router\Route;
use App\Controllers\User\Registration\IndexRagistrationController;
use App\Controllers\Admin\Main\IndexAdmMainController;
use App\Controllers\Admin\User\IndexUsersController;
use App\Controllers\Admin\User\ShowUsersController;
use App\Controllers\Admin\User\EditUsersController;
use App\Controllers\Admin\User\UpdateUsersController;
use App\Controllers\Admin\User\StoreUsersController;
use App\Controllers\Admin\User\DeleteUsersController;
use App\Controllers\Admin\Product\IndexProductsController;
use App\Controllers\Admin\Product\CreateProductsController;
use App\Controllers\Admin\Product\StoreProductsController;
use App\Controllers\Admin\Product\ShowProductsController;
use App\Controllers\Admin\Product\EditProductsController;
use App\Controllers\Admin\Product\DeleteProductsController;
use App\Controllers\Admin\Product\UpdateProductsController;

return [
        Route::get("/", [IndexController::class, "index"]),
        Route::get("/registration",  [IndexRagistrationController::class, "index"]),
        Route::post("/registration/store",  [StoreRegistrationController::class, "add"]),



   /*     Admin routes*/

        Route::get("/admin", [IndexAdmMainController::class, "index"]),

        Route::get("/admin/products", [IndexProductsController::class, "index"]),
        Route::get("/admin/products/create", [CreateProductsController::class, "create"]),
        Route::post("/admin/products/create", [StoreProductsController::class, "store"]),
        Route::get("/admin/products/product1", [ShowProductsController::class, "show"]),
        Route::get("/admin/product1/edit", [EditProductsController::class, "edit"]),
        Route::post("/admin/product1/edit", [UpdateProductsController::class, "update"]),
        Route::post("/admin/product1/delete", [DeleteProductsController::class, "delete"]),

        Route::get("/admin/users", [IndexUsersController::class, "index"]),
        Route::post("/users/", [StoreUsersController::class, "store"]),
        Route::get("/admin/users/user1", [ShowUsersController::class, "show"]),
        Route::get("/admin/user1/edit", [EditUsersController::class, "edit"]),
        Route::post("/admin/user1/update", [UpdateUsersController::class, "update"]),
        Route::post("/admin/user1/delete", [DeleteUsersController::class, "delete"]),



];