

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
use App\Controllers\Catalog\IndexCatalogController;
use App\Controllers\Catalog\ShowCatalogController;
use App\Controllers\Cart\StoreCartController;
use App\Controllers\Contacts\StoreContactsController;
use App\Controllers\Cart\UpdateCartController;
use App\Controllers\Checkout\IndexCheckoutController;
use App\Controllers\Checkout\StoreCheckoutController;
use App\Controllers\User\ForgotPass\IndexForgotPassController;
use App\Controllers\User\ForgotPass\StoreForgotPassController;
use App\Controllers\User\ForgotPass\IndexResetPassController;
use App\Controllers\User\ForgotPass\UpdateForgotPassController;
use App\Middleware\SuperAdminMiddleware;
use App\Controllers\About\IndexAboutController;
use App\Controllers\Admin\Order\IndexOrdersController;
use App\Controllers\Admin\Order\ShowOrdersController;
use App\Controllers\Admin\Order\DeleteOrdersController;

return [
        Route::get("/", [IndexController::class, "index"]),

        Route::get("/catalog", [IndexCatalogController::class, "index"]),
        Route::get("/catalog/product/", [ShowCatalogController::class, "show"]),


        Route::get("/registration",  [IndexRagistrationController::class, "index"], [GuestMiddleware::class]),
        Route::post("/registration",  [StoreRegistrationController::class, "store"],[GuestMiddleware::class]),

        Route::get("/authorisation",  [IndexAuthorisationController::class, "index"], [GuestMiddleware::class]),
        Route::post("/authorisation",  [StoreAuthorisationController::class, "store"], [GuestMiddleware::class]),
        Route::get("/forgot-password", [IndexForgotPassController::class, "index"], [GuestMiddleware::class]),
        Route::post("/forgot-password", [StoreForgotPassController::class, "store"], [GuestMiddleware::class]),
        Route::get("/reset-password", [IndexResetPassController::class, "index"], [GuestMiddleware::class]),
        Route::post("/reset-password", [UpdateForgotPassController::class, "update"], [GuestMiddleware::class]),
        Route::post("/logout",  [LogoutAuthorisationController::class, "logout"], [AuthMiddleware::class]),

        Route::get("/contacts", [IndexContactsController::class,"index"]),
        Route::post("/contacts", [StoreContactsController::class,"store"]),
        Route::get("/about", [IndexAboutController::class, "index"]),
        Route::get("/shopping-cart",[IndexCartController::class, "index"]),
        Route::post("/shopping-cart/add",[StoreCartController::class, "store"], [AuthMiddleware::class]),
        Route::post("/shopping-cart/remove", [UpdateCartController::class, "remove"], [AuthMiddleware::class]),
        Route::post("/shopping-cart/change-quantity", [UpdateCartController::class, "updateQuantity"], [AuthMiddleware::class]),
        Route::get("/checkout-order",[IndexCheckoutController::class, "index"], [AuthMiddleware::class]),
        Route::post("/checkout-order",[StoreCheckoutController::class, "store"], [AuthMiddleware::class]),

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
        Route::post("/users/", [StoreUsersController::class, "store"], [SuperAdminMiddleware::class]),
        Route::get("/admin/users/", [ShowUsersController::class, "show"], [AdminMiddleware::class]),
        Route::get("/admin/edit/", [EditUsersController::class, "edit"], [AdminMiddleware::class]),
        Route::post("/admin/update/", [UpdateUsersController::class, "update"], [AdminMiddleware::class]),
        Route::post("/admin/delete", [DeleteUsersController::class, "delete"], [SuperAdminMiddleware::class]),


        Route::get("/admin/orders", [IndexOrdersController::class, "index"], [AdminMiddleware::class]),
        Route::post("/admin/orders", [IndexOrdersController::class, "search"], [AdminMiddleware::class]),
        Route::get("/admin/orders/", [ShowOrdersController::class, "show"], [AdminMiddleware::class]),
        Route::delete("/admin/orders/delete", [DeleteOrdersController::class, "delete"], [AdminMiddleware::class]),



];