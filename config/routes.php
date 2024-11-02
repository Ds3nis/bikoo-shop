

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
use App\Controllers\User\Authorisation\IndexAuthorisationController;
use App\Controllers\User\Authorisation\StoreAuthorisationController;
use App\Controllers\User\Authorisation\LogoutAuthorisationController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use App\Controllers\Contacts\IndexContactsController;
use App\Controllers\Cart\IndexCartController;
use App\Controllers\Profile\ProfileData\IndexProfileDataController;
use App\Controllers\Profile\ProfileOrders\IndexProfileOrdersController;
use App\Controllers\Profile\ProfileChange\IndexProfileChangeController;
use App\Controllers\Profile\ProfileData\UpdateProfileDataController;
use App\Controllers\Profile\ProfileChange\UpdateProfileChangeController;
use App\Middleware\AdminMiddleware;

return [
        Route::get("/", [IndexController::class, "index"]),
        Route::get("/registration",  [IndexRagistrationController::class, "index"], [GuestMiddleware::class]),
        Route::post("/registration",  [StoreRegistrationController::class, "store"],[GuestMiddleware::class]),

        Route::get("/authorisation",  [IndexAuthorisationController::class, "index"], [GuestMiddleware::class]),
        Route::post("/authorisation",  [StoreAuthorisationController::class, "store"], [GuestMiddleware::class]),
        Route::post("/logout",  [LogoutAuthorisationController::class, "logout"], [AuthMiddleware::class]),

        Route::get("/contacts", [IndexContactsController::class,"index"]),
        Route::get("/shopping-cart",[IndexCartController::class, "index"]),

        Route::get("/profile", [IndexProfileDataController::class, "index"], [AuthMiddleware::class]),
        Route::post("/profile", [UpdateProfileDataController::class, "update"], [AuthMiddleware::class]),


        Route::get("/profile/orders", [IndexProfileOrdersController::class, "index"], [AuthMiddleware::class]),
        Route::get("/profile/change/password", [IndexProfileChangeController::class, "index"], [AuthMiddleware::class]),
        Route::post("/profile/change/password", [UpdateProfileChangeController::class, "update"], [AuthMiddleware::class]),



   /*     Admin routes*/

        Route::get("/admin", [IndexAdmMainController::class, "index"], [AdminMiddleware::class]),

        Route::get("/admin/products", [IndexProductsController::class, "index"], [AdminMiddleware::class]),
        Route::get("/admin/products/create", [CreateProductsController::class, "create"], [AdminMiddleware::class]),
        Route::post("/admin/products/create", [StoreProductsController::class, "store"], [AdminMiddleware::class]),
        Route::get("/admin/products/", [ShowProductsController::class, "show"], [AdminMiddleware::class]),
        Route::get("/admin/product/edit/", [EditProductsController::class, "edit"], [AdminMiddleware::class]),
        Route::post("/admin/product/edit", [UpdateProductsController::class, "update"], [AdminMiddleware::class]),
        Route::post("/admin/product/delete", [DeleteProductsController::class, "delete"], [AdminMiddleware::class]),

        Route::get("/admin/users", [IndexUsersController::class, "index"], [AdminMiddleware::class]),
        Route::post("/users/", [StoreUsersController::class, "store"], [AdminMiddleware::class]),
        Route::get("/admin/users/", [ShowUsersController::class, "show"], [AdminMiddleware::class]),
        Route::get("/admin/edit/", [EditUsersController::class, "edit"], [AdminMiddleware::class]),
        Route::post("/admin/update/", [UpdateUsersController::class, "update"], [AdminMiddleware::class]),
        Route::post("/admin/delete", [DeleteUsersController::class, "delete"], [AdminMiddleware::class]),



];