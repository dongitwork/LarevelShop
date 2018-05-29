<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        'guest.customer' => \App\Http\Middleware\CustomerRedirectIfAuthenticated::class,
        'auth.customer' => \App\Http\Middleware\CustomerAuthenticate::class,

        //****************** Phân Quyền ***************************
        'user.list' => \App\Http\Middleware\AppMiddleware\ListUser::class,
        'user.add' => \App\Http\Middleware\AppMiddleware\AddUser::class,
        'user.edit' => \App\Http\Middleware\AppMiddleware\EditUser::class,
        'user.delete' => \App\Http\Middleware\AppMiddleware\DeleteUser::class,

        'gift.list' => \App\Http\Middleware\AppMiddleware\ListGift::class,
        'gift.add' => \App\Http\Middleware\AppMiddleware\AddGift::class,
        'gift.edit' => \App\Http\Middleware\AppMiddleware\EditGift::class,
        'gift.delete' => \App\Http\Middleware\AppMiddleware\DeleteGift::class,

        'discount.list' => \App\Http\Middleware\AppMiddleware\ListDiscount::class,
        'discount.add' => \App\Http\Middleware\AppMiddleware\AddDiscount::class,
        'discount.edit' => \App\Http\Middleware\AppMiddleware\EditDiscount::class,
        'discount.delete' => \App\Http\Middleware\AppMiddleware\DeleteDiscount::class,

        'product.list' => \App\Http\Middleware\AppMiddleware\ListProduct::class,
        'product.add' => \App\Http\Middleware\AppMiddleware\AddProduct::class,
        'product.edit' => \App\Http\Middleware\AppMiddleware\EditProduct::class,
        'product.delete' => \App\Http\Middleware\AppMiddleware\DeleteProduct::class,

        'productpublish.list' => \App\Http\Middleware\AppMiddleware\ListProductPublish::class,
        'productpublish.add' => \App\Http\Middleware\AppMiddleware\AddProductPublish::class,
        'productpublish.edit' => \App\Http\Middleware\AppMiddleware\EditProductPublish::class,
        'productpublish.delete' => \App\Http\Middleware\AppMiddleware\DeleteProductPublish::class,

        'slider.list' => \App\Http\Middleware\AppMiddleware\ListSlider::class,
        'slider.add' => \App\Http\Middleware\AppMiddleware\AddSlider::class,
        'slider.edit' => \App\Http\Middleware\AppMiddleware\EditSlider::class,
        'slider.delete' => \App\Http\Middleware\AppMiddleware\DeleteSlider::class,

        'productoption.list' => \App\Http\Middleware\AppMiddleware\ListProductOption::class,
        'productoption.add' => \App\Http\Middleware\AppMiddleware\AddProductOption::class,
        'productoption.edit' => \App\Http\Middleware\AppMiddleware\EditProductOption::class,
        'productoption.delete' => \App\Http\Middleware\AppMiddleware\DeleteProductOption::class,

        'post.list' => \App\Http\Middleware\AppMiddleware\ListPost::class,
        'post.add' => \App\Http\Middleware\AppMiddleware\AddPost::class,
        'post.edit' => \App\Http\Middleware\AppMiddleware\EditPost::class,
        'post.delete' => \App\Http\Middleware\AppMiddleware\DeletePost::class,

        'category.list' => \App\Http\Middleware\AppMiddleware\ListCategory::class,
        'category.add' => \App\Http\Middleware\AppMiddleware\AddCategory::class,
        'category.edit' => \App\Http\Middleware\AppMiddleware\EditCategory::class,
        'category.delete' => \App\Http\Middleware\AppMiddleware\DeleteCategory::class,

        'manu.list' => \App\Http\Middleware\AppMiddleware\ListManu::class,
        'manu.add' => \App\Http\Middleware\AppMiddleware\AddManu::class,
        'manu.edit' => \App\Http\Middleware\AppMiddleware\EditManu::class,
        'manu.delete' => \App\Http\Middleware\AppMiddleware\DeleteManu::class,

        'tax.list' => \App\Http\Middleware\AppMiddleware\ListTax::class,
        'tax.add' => \App\Http\Middleware\AppMiddleware\AddTax::class,
        'tax.edit' => \App\Http\Middleware\AppMiddleware\EditTax::class,
        'tax.delete' => \App\Http\Middleware\AppMiddleware\DeleteTax::class,

        'comment.list' => \App\Http\Middleware\AppMiddleware\ListComment::class,
        'comment.reply' => \App\Http\Middleware\AppMiddleware\ReplyComment::class,
        'comment.detail' => \App\Http\Middleware\AppMiddleware\DetailComment::class,

        'contact.list' => \App\Http\Middleware\AppMiddleware\ListContact::class,
        'contact.reply' => \App\Http\Middleware\AppMiddleware\ReplyContact::class,
        'contact.detail' => \App\Http\Middleware\AppMiddleware\DetailContact::class,

        'role.list' => \App\Http\Middleware\AppMiddleware\ListRole::class,
        'role.add' => \App\Http\Middleware\AppMiddleware\AddRole::class,
        'role.edit' => \App\Http\Middleware\AppMiddleware\EditRole::class,
        'role.delete' => \App\Http\Middleware\AppMiddleware\DeleteRole::class,

        'order.list' => \App\Http\Middleware\AppMiddleware\ListOrder::class,
        'order.edit' => \App\Http\Middleware\AppMiddleware\EditOrderStatus::class,
        'order.detail' => \App\Http\Middleware\AppMiddleware\DetailOrder::class,

        'orderstatus.list' => \App\Http\Middleware\AppMiddleware\ListOrderStatus::class,
        'orderstatus.add' => \App\Http\Middleware\AppMiddleware\AddOrderStatus::class,
        'orderstatus.edit' => \App\Http\Middleware\AppMiddleware\EditOrderStatusType::class,
        'orderstatus.delete' => \App\Http\Middleware\AppMiddleware\DeleteOrderStatus::class,

        'rolemanager.list' => \App\Http\Middleware\AppMiddleware\ListRoleManager::class,
        'rolemanager.add' => \App\Http\Middleware\AppMiddleware\AddRoleManager::class,

        'postcate.list' => \App\Http\Middleware\AppMiddleware\ListPostCate::class,
        'postcate.add' => \App\Http\Middleware\AppMiddleware\AddPostCate::class,
        'postcate.edit' => \App\Http\Middleware\AppMiddleware\EditPostCate::class,
        'postcate.delete' => \App\Http\Middleware\AppMiddleware\DeletePostCate::class,
    ];
}
