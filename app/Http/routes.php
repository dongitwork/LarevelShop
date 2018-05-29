<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//********************************************** TEST AREA **********************************************
Route::get('clearSession','ShoppingCartController@clearSession');
Route::get('showSession','ShoppingCartController@showSession');
Route::get('showCustomer','ShoppingCartController@showCustomer');
Route::get('testSession','ShoppingCartController@testSession');


//********************************************** HOME AREA **********************************************
Route::get('/',['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/product/views/{id}', ['as' => 'product.getShow', 'uses' => 'ProductController@getShowProduct']);
Route::post('/product/views/{id}', ['as' => 'product.postShow', 'uses' => 'ProductController@postShowProduct']);
Route::get('/category/views/{id}', ['as' => 'category.getShow', 'uses' => 'ProductController@getProductByCategory']);

Route::get('post/views/{id}', ['as' => 'post.postDetail', 'uses' => 'PostController@getPostDetail']);

Route::get('/promotion', ['as' => 'promotion.getPromotion', 'uses' => 'HomeController@getPromotion']);

Route::get('/search', ['as' => 'search.getSearch', 'uses' => 'HomeController@getSearch']);

Route::get('/contact', ['as' => 'contact.getContact', 'uses' => 'HomeController@getContact']);

//********************************************** CONTACT AREA **********************************************
Route::get('/contact', ['as' => 'contact.getContact', 'uses' => 'ContactController@getContact']);
Route::post('/contact', ['as' => 'contact.postContact', 'uses' => 'ContactController@postContact']);


//********************************************** SHOPPING AREA **********************************************
Route::get('cart',['as' => 'shopping.cart', 'uses' => 'ShoppingCartController@getShoppingCart']);
Route::post('cart',['as' => 'check.submit', 'uses' => 'ShoppingCartController@postCheckSubmit']);
Route::get('remove_cart_item/{id}',['as' => 'remove.shopping.cart.item', 'uses' => 'ShoppingCartController@getRemoveShoppingCartItem']);

//********************************************** COMMENT AREA **********************************************
Route::post('/product/views/{id}', ['as' => 'product.postCheckSubmitFPD', 'uses' => 'ShoppingCartController@postCheckSubmitFromProductDetail']);

//********************************************** CHECKOUT AREA **********************************************
Route::get('payment',['as' => 'payment.get', 'uses' => 'PaymentController@getPayment']);
Route::post('payment',['as' => 'payment.post', 'uses' => 'PaymentController@postPayment']);
Route::get('payment_deliver',['as' => 'payment.deliver', 'uses' => 'PaymentController@getPaymentDeliver']);
Route::get('loadDistrict/{id}',['as' => 'payment.district', 'uses'=> 'PaymentController@getDistrict']);
Route::get('loadWard/{id}',['as' => 'payment.ward', 'uses' => 'PaymentController@getWard']);
Route::get('payment_success',['as' => 'payment.success', 'uses' => 'PaymentController@getPaymentSuccess']);
Route::get('/cancel/{order_id}',['as' => 'cancel','uses' => 'PaymentController@getCancelURL']);

//********************************************** EMAIL AREA **********************************************
Route::group(['prefix' => 'mail'], function(){
    //Custmer Registry Email
    Route::get('send_confirm_code',['as' => 'mail.getSendConfirmCode', 'uses' => 'MailController@sendConfirmEmail']);
    Route::get('resend_confirm_code',['as' => 'mail.getResendConfirmCode', 'uses' => 'MailController@getResendConfirmEmail']);
    Route::post('resend_confirm_code',['as' => 'mail.postResendConfirmCode', 'uses' => 'MailController@postResendConfirmEmail']);
    Route::get('authenticate_confirm_code/{code}',['as' => 'mail.getAuthenticateConfirmCode', 'uses' => 'MailController@authenticateConfirmCode']);
    //Order Successful Email
    Route::get('send_order_success/{OrderId}',['as' => 'mail.sendOrderSuccessEMail', 'uses' => 'MailController@sendOrderSuccessEMail']);
    //Send Reply Contact Email
    Route::get('send_reply_contact/{id}',['as' => 'mail.sendReplyContact', 'uses' => 'MailController@sendReplyContactEmail']);
});

//********************************************** CUSTOMER AREA **********************************************
Route::group(['prefix' => 'customer'], function(){
    Route::get('creation_successful',['as' => 'customer.creation_successful', 'uses' => 'CustomerController@getCreationSuccessfull']);
    Route::get('creation',['as' => 'customer.getCreation', 'uses' => 'CustomerController@getCreation']);
    Route::post('creation',['as' => 'customer.postCreation', 'uses' => 'CustomerController@postCreation']);

    Route::get('customer-setting',['as' => 'customer.getCustomerSetting', 'uses' => 'CustomerController@getCustomerSetting']);
    Route::post('customer-setting',['as' => 'customer.postCustomerSetting', 'uses' => 'CustomerController@postCustomerSetting']);

    Route::get('customer-order',['as' => 'customer.getOrderHistory', 'uses' => 'CustomerController@getOrderHistory']);

    Route::get('order_detail/{id}',['as' => 'customer.getOrderDetail', 'uses' => 'CustomerController@getOrderDetail']);

    Route::get('changed_pass',['as' => 'customer.getChangedPass', 'uses' => 'CustomerController@getChangedPass']);
    Route::post('changed_pass',['as' => 'customer.postChangedPass', 'uses' => 'CustomerController@postChangedPass']);

    Route::get('confirm-success',['as' => 'customer.getConfirmSuccess', 'uses' => 'CustomerController@getConfirmSuccess']);
});




//********************************************** LOGIN & LOGOUT AREA **********************************************
Route::group(['prefix' => 'login'],function(){
    Route::get('admin',['as' => 'user.getLogin', 'uses' => 'Auth\AuthController@getUserLogin']);
    Route::post('admin',['as' => 'user.postLogin', 'uses' => 'Auth\AuthController@postUserLogin']);

    Route::get('customer',['as' => 'customer.getLogin', 'uses' => 'Auth\CustomerAuthController@getCustomerLogin']);
    Route::post('customer',['as' => 'customer.postLogin', 'uses' => 'Auth\CustomerAuthController@postCustomerLogin']);
});
Route::group(['prefix' => 'logout'], function(){
    Route::get('admin',['as' => 'user.logout', 'uses' => 'Auth\AuthController@userLogout']);
    Route::get('customer',['as' => 'customer.logout', 'uses' => 'Auth\CustomerAuthController@customerLogout']);
    //hàm logout trong controller liên quan tới middleware bên AuthController -> function __construct()
});


//********************************************** ADMIN AREA **********************************************
Route::group(['prefix'=>'admin','middleware' => 'auth'],function(){

    Route::get('cpanel',['as' => 'control_panel', 'uses' => 'AdminController@adminmain']);

    /********* Slider *********************/
    Route::get('list_slider', ['as' => 'Slider.List', 'uses' => 'SliderController@getListSlider', 'middleware' => 'slider.list']);
    Route::post('list_slider', ['as' => 'Slider.List', 'uses' => 'SliderController@getDeleteAllSlider']);

    Route::get('add_slider',   ['as' => 'Slider.Add', 'uses' => 'SliderController@getAddSlider', 'middleware' => 'slider.add']);
    Route::post('add_slider', ['as' => 'Slider.Add', 'uses' => 'SliderController@postAddSlider']);

    Route::get('edit_slider/{id}', ['as' => 'Slider.Edit', 'uses' => 'SliderController@getEditSlider', 'middleware' => 'slider.edit']);
    Route::post('edit_slider/{id}', ['as' => 'Slider.Edit', 'uses' => 'SliderController@postEditSlider']);

    Route::get('del_slider/{id}', ['as' => 'Slider.Delete', 'uses' => 'SliderController@getDeleteSlider', 'middleware' => 'slider.delete']);
    //******************************* USER AREA *******************************
    Route::group(['prefix'=>'user'], function(){
        Route::get('list_user', ['as' => 'user.list', 'uses' => 'UserController@getListUser', 'middleware' => 'user.list']);
        Route::get('add_user', ['as' => 'user.getAdd', 'uses' => 'UserController@getAddUser', 'middleware' => 'user.add']);
        Route::post('add_user', ['as' => 'user.postAdd', 'uses' => 'UserController@postAddUser']);
        Route::get('edit_user/{id}', ['as' => 'user.getEdit', 'uses' => 'UserController@getEditUser', 'middleware' => 'user.edit']);
        Route::post('edit_user/{id}', ['as' => 'user.postEdit', 'uses' => 'UserController@postEditUser']);
        Route::get('delete_user/{id}', ['as' => 'user.getDelete', 'uses' => 'UserController@getDeleteUser', 'middleware' => 'user.delete']);

        Route::post('list_user', ['as' => 'user.getsDelete', 'uses' =>'UserController@UserDleAll', 'middleware' => 'user.delete']);
    });

    //******************************* ROLE AREA *******************************
    Route::group(['prefix'=>'role'], function(){
        Route::get('list_role', ['as' => 'role.list', 'uses' => 'RoleController@getListRole', 'middleware' => 'role.list']);
        Route::post('list_role', ['as' => 'role.postDelete', 'uses' => 'RoleController@postDeleteAllRole', 'middleware' => 'role.delete']);
        Route::get('add_role', ['as' => 'role.getAdd', 'uses' => 'RoleController@getAddRole', 'middleware' => 'role.add']);
        Route::post('add_role', ['as' => 'role.postAdd', 'uses' => 'RoleController@postAddRole']);
        Route::get('edit_role/{id}', ['as' => 'role.getEdit', 'uses' => 'RoleController@getEditRole', 'middleware' => 'role.edit']);
        Route::post('edit_role/{id}', ['as' => 'role.postEdit', 'uses' => 'RoleController@postEditRole']);
        Route::get('delete_role/{id}', ['as' => 'role.getDelete', 'uses' => 'RoleController@getDeleteRole', 'middleware' => 'role.delete']);
        //QUẢN LÝ QUYỀN
        Route::get('manager_role_permision', ['as' => 'role.getManagerRP', 'uses' => 'RoleController@getManagerRP', 'middleware' => 'rolemanager.list']);
        Route::post('manager_role_permision', ['as' => 'role.postManagerRP', 'uses' => 'RoleController@postManagerRP', 'middleware' => 'rolemanager.add']);
    });

    //******************************* CATEGORY AREA *******************************
	Route::group(['prefix'=>'cate'], function(){
        Route::get('list_cate', ['as' => 'cate.list', 'uses' => 'CategoryController@getListCategory', 'middleware' => 'category.list']);
        
        Route::get('add_cate', ['as' => 'cate.getAdd', 'uses' => 'CategoryController@getAddCategory', 'middleware' => 'category.add']);
        Route::post('add_cate', ['as' => 'cate.postAdd', 'uses' => 'CategoryController@postAddCategory']);

        Route::get('edit_cate/{id}', ['as' => 'cate.getEdit', 'uses' => 'CategoryController@getEditCategory', 'middleware' => 'category.edit']);
		Route::post('edit_cate/{id}', ['as' => 'cate.postEdit', 'uses' => 'CategoryController@postEditCategory']);

        Route::get('del_cate/{CategoryId}', ['as' => 'cate.getDelete', 'uses' =>'CategoryController@destroy', 'middleware' => 'category.delete']);

        Route::post('list_cate', ['as' => 'cate.getsDelete', 'uses' =>'CategoryController@CateDleAll', 'middleware' => 'category.delete']);
    });

    //******************************* Tin Tức *******************************
    Route::group(['prefix'=>'post'], function(){
        

        Route::get('list-cate-post', ['as' => 'post.listcate', 'uses' => 'PostController@getListCategoryPost']);
        
        Route::get('add-cate-post', ['as' => 'post.getAddCate', 'uses' => 'PostController@getAddCategory']);
        Route::post('add-cate-post', ['as' => 'post.postAddCate', 'uses' => 'PostController@postAddCategory']);

        Route::get('edit-cate-post/{id}', ['as' => 'post.getEditCate', 'uses' => 'PostController@getEditCategory']);
        Route::post('edit-cate-post/{id}', ['as' => 'post.postEditCate', 'uses' => 'PostController@postEditCategory']);

        Route::get('del-cate-post/{id}', ['as' => 'post.getDeleteCate', 'uses' =>'PostController@postdelCategory']);

        Route::get('list-posts', ['as' => 'posts.list', 'uses' => 'PostController@getListPosts', 'middleware' => 'post.list']);
        
        Route::get('add-posts', ['as' =>'posts.getAdd','uses' => 'PostController@getAddPosts', 'middleware' => 'post.add']);
        Route::post('add-posts',['as' =>'posts.postAdd','uses' => 'PostController@postAddPosts']);

        Route::get('edit-posts/{id}', ['as' => 'posts.getEdit', 'uses' => 'PostController@getEditPosts', 'middleware' => 'post.edit']);
        Route::post('edit-posts/{id}', ['as' => 'posts.postEdit', 'uses' => 'PostController@postEditPosts']);

        Route::get('del-posts/{CategoryId}', ['as' => 'post.getDelete', 'uses' =>'PostController@postdelPosts', 'middleware' => 'post.delete']);
        Route::post('list-posts', ['as' => 'posts.postDelete', 'uses' => 'PostController@postDeleteAllPost', 'middleware' => 'post.delete']);

        Route::post('list-cate-post', ['as' => 'post.postDelete', 'uses' => 'PostController@postDeleteAllPostCate']);

    });

    //******************************* PRODUCT AREA *******************************
    Route::group(['prefix'=>'product'], function(){
        Route::get('list', ['as' => 'product.list', 'uses' => 'ProductController@getListProduct', 'middleware' => 'product.list']);

        Route::get('list-detail/{id}',['as' => 'product.getDetail','uses' => 'ProductController@getDetailProduct', 'middleware' => 'product.list']);

        Route::get('add', ['as' => 'product.getAdd', 'uses' => 'ProductController@getAddProduct', 'middleware' => 'product.add']);
        Route::post('add', ['as' => 'product.postAdd', 'uses' => 'ProductController@postAddProduct']);

        Route::get('edit/{id}', ['as' => 'product.getEdit', 'uses' => 'ProductController@getEditProduct', 'middleware' => 'product.edit']);
        Route::post('edit/{id}', ['as' => 'product.postEdit', 'uses' => 'ProductController@postEditProduct']);

        Route::get('del/{id}', ['as' => 'product.getDelete', 'uses' =>'ProductController@destroy', 'middleware' => 'product.delete']);

        Route::get('add-productpublish', ['as' => 'product.getAddProductPublish', 'uses' => 'ProductController@getAddProductPublish', 'middleware' => 'product.add']);
        Route::post('add-productpublish', ['as' => 'product.postAddProductPublish', 'uses' => 'ProductController@postAddProductPublish']);

        Route::get('has-promotion/{type}', ['as' => 'product.getAddPromotion', 'uses' => 'ProductController@getAddPromotion']);
        Route::get('check-product/{id}', ['as' => 'product.getCheckProcuct', 'uses' => 'ProductController@getCheckProcuct']);

        Route::get('list_promotion', ['as' => 'product.listpromotion', 'uses' => 'ProductController@getListProductPromotion']);

        Route::get('edit_promotion/{id}', ['as' => 'product.getEditpromotion', 'uses' => 'ProductController@getEditProductPromotion']);
        Route::post('edit_promotion/{id}', ['as' => 'product.postEditpromotion', 'uses' => 'ProductController@postEditProductPromotion']);
    });

    //******************************* SHIPPER AREA *******************************
    Route::group(['prefix'=>'shipper'], function(){
        Route::get('list', ['as' => 'shipper.list', 'uses' => 'ShipperController@getList']);

        Route::get('add', ['as' => 'shipper.getAdd', 'uses' => 'ShipperController@getAdd']);
        Route::post('add', ['as' => 'shipper.postAdd', 'uses' => 'ShipperController@postAdd']);

        Route::get('edit/{id}', ['as' => 'shipper.getEdit', 'uses' => 'ShipperController@getEdit']);
        Route::post('edit/{id}', ['as' => 'shipper.postEdit', 'uses' => 'ShipperController@postEdit']);

       Route::get('del/{id}', ['as' => 'shipper.getDelete', 'uses' =>'ShipperController@destroy']);

        Route::post('list', ['as' => 'shipper.getsDelete', 'uses' =>'ShipperController@DleAll']);
    });

    //******************************* PRODUCT OPTION AREA *******************************
    Route::group(['prefix'=>'pro-option'], function(){
        Route::get('list', ['as' => 'ProOption.list', 'uses' => 'ProductOptionController@getListOption', 'middleware' => 'productoption.list']);

        Route::get('add', ['as' => 'ProOption.getAdd', 'uses' => 'ProductOptionController@getAddOption', 'middleware' => 'productoption.add']);
        Route::post('add', ['as' => 'ProOption.postAdd', 'uses' => 'ProductOptionController@postAddOption']);

        Route::get('edit/{id}', ['as' => 'ProOption.getEdit', 'uses' => 'ProductOptionController@getEditOption', 'middleware' => 'productoption.edit']);
        Route::post('edit/{id}', ['as' => 'ProOption.postEdit', 'uses' => 'ProductOptionController@postEditOption']);

        Route::get('del/{id}', ['as' => 'ProOption.getDelete', 'uses' =>'ProductOptionController@destroy', 'middleware' => 'productoption.delete']);
    });

    //******************************* MANUFACTURER AREA *******************************
    Route::group(['prefix'=>'manuf'], function(){
        Route::get('list_manufacturer', ['as' => 'manuf.list', 'uses' => 'ManufacturerController@getListManufacturer', 'middleware' => 'manu.list']);

        Route::get('add_manufacturer', ['as' => 'manuf.getAdd', 'uses' => 'ManufacturerController@getAddManufacturer', 'middleware' => 'manu.add']);
        Route::post('add_manufacturer', ['as' => 'manuf.postAdd', 'uses' => 'ManufacturerController@postAddManufacturer']);

        Route::get('edit_manufacturer/{id}', ['as' => 'manuf.getEdit', 'uses' => 'ManufacturerController@getEditManufacturer', 'middleware' => 'manu.edit']);
        Route::post('edit_manufacturer/{id}', ['as' => 'manuf.postEdit', 'uses' => 'ManufacturerController@postEditManufacturer']);

        Route::get('del_manufacturer/{ManufacturerId}', ['as' => 'manuf.getDelete', 'uses' =>'ManufacturerController@destroy', 'middleware' => 'manu.delete']);

        Route::post('list_manufacturer', ['as' => 'manufacturer.postDelete', 'uses' => 'ManufacturerController@postDeleteAllManu', 'middleware' => 'manu.delete']);
    });

    
    //******************************* TAX AREA *******************************
    Route::group(['prefix'=>'tax'], function(){
        Route::get('list_tax', ['as' => 'tax.list', 'uses' => 'TaxController@getListTax', 'middleware' => 'tax.list']);

        Route::get('add_tax', ['as' => 'tax.getAdd', 'uses' => 'TaxController@getAddTax', 'middleware' => 'tax.add']);
        Route::post('add_tax', ['as' => 'tax.postAdd', 'uses' => 'TaxController@postAddTax']);

        Route::get('edit_tax/{id}', ['as' => 'tax.getEdit', 'uses' => 'TaxController@getEditTax', 'middleware' => 'tax.edit']);
        Route::post('edit_tax/{id}', ['as' => 'tax.postEdit', 'uses' => 'TaxController@postEditTax']);

        Route::get('del_tax/{TaxId}', ['as' => 'tax.getDelete', 'uses' =>'TaxController@destroy', 'middleware' => 'tax.delete']);
        Route::post('list_tax', ['as' => 'tax.postDelete', 'uses' => 'TaxController@postDeleteAllTax', 'middleware' => 'tax.delete']);
    });

    //******************************* DISCOUNT AREA *******************************
    Route::group(['prefix'=>'discount'], function(){
        Route::get('list-discount', ['as' => 'discount.list', 'uses' => 'PromotionController@getListDiscount', 'middleware' => 'discount.list']);
        Route::get('add_discount', ['as' => 'discount.getAdd', 'uses' => 'PromotionController@getAddDiscount', 'middleware' => 'discount.add']);
        Route::post('add_discount', ['as' => 'discount.postAdd', 'uses' => 'PromotionController@postAddDiscount']);
        Route::get('edit_discount/{id}', ['as' => 'discount.getEdit', 'uses' => 'PromotionController@getEditDiscount', 'middleware' => 'discount.edit']);
        Route::post('edit_discount/{id}', ['as' => 'discount.postEdit', 'uses' => 'PromotionController@postEditDiscount']);
        Route::get('del_discount/{id}', ['as' => 'discount.getDelete', 'uses' =>'PromotionController@DiscountDestroy', 'middleware' => 'discount.delete']);

        Route::post('list-discount', ['as' => 'discount.getsDelete', 'uses' =>'PromotionController@DiscountDleAll', 'middleware' => 'discount.delete']);
    });

    //******************************* GIFT AREA *******************************
    Route::group(['prefix'=>'gift'], function(){
        Route::get('list-gift', ['as' => 'gift.list', 'uses' => 'PromotionController@getListGift', 'middleware' => 'gift.list']);
        Route::get('add-gift', ['as' => 'gift.getAdd', 'uses' => 'PromotionController@getAddGift', 'middleware' => 'gift.add']);
        Route::post('add-gift', ['as' => 'gift.postAdd', 'uses' => 'PromotionController@postAddGift']);
        Route::get('edit-gift/{id}', ['as' => 'gift.getEdit', 'uses' => 'PromotionController@getEditGift', 'middleware' => 'gift.edit']);
        Route::post('edit-gift/{id}', ['as' => 'gift.postEdit', 'uses' => 'PromotionController@postEditGift']);
        Route::get('del-gift/{id}', ['as' => 'gift.getDelete', 'uses' =>'PromotionController@GiftDestroy', 'middleware' => 'gift.delete']);

        Route::post('list-gift', ['as' => 'gift.getsDelete', 'uses' =>'PromotionController@GiftDleAll', 'middleware' => 'gift.delete']);
    });
    //******************************* ORDER AREA *******************************
    Route::group(['prefix'=>'order'], function(){
        Route::get('list_order', ['as' => 'order.list', 'uses' => 'OrderController@getListOrder', 'middleware' => 'order.list']);
        Route::get('order_detail/{id}', ['as' => 'order.getDetail', 'uses' => 'OrderController@getOrderDetail', 'middleware' => 'order.detail']);
        Route::post('order_detail/{id}', ['as' => 'order.postDetail', 'uses' => 'OrderController@postOrderDetail', 'middleware' => 'order.edit']);
    });

    //******************************* STATUS AREA *******************************
    Route::group(['prefix'=>'status'], function(){
        Route::get('list_status', ['as' => 'status.list', 'uses' => 'StatusController@getListStatus', 'middleware' => 'orderstatus.list']);
        Route::post('list_status', ['as' => 'status.postDeleteMulti', 'uses' => 'StatusController@postDeleteMultiStatus']);

        Route::get('add_status', ['as' => 'status.getAdd', 'uses' => 'StatusController@getAddStatus', 'middleware' => 'orderstatus.add']);
        Route::post('add_status', ['as' => 'status.postAdd', 'uses' => 'StatusController@postAddStatus']);

        Route::get('edit_status/{id}', ['as' => 'status.getEdit', 'uses' => 'StatusController@getEditStatus', 'middleware' => 'orderstatus.edit']);
        Route::post('edit_status/{id}', ['as' => 'status.postEdit', 'uses' => 'StatusController@postEditStatus']);

        Route::get('delete_status/{id}', ['as' => 'status.getDelete', 'uses' => 'StatusController@getDeleteStatus', 'middleware' => 'orderstatus.delete']);
    });
    
    //******************************* COMMENT AREA *******************************
    Route::group(['prefix'=>'comment'], function(){
        Route::get('list_comment', ['as' => 'comment.list', 'uses' => 'CustomerController@getListComment', 'middleware' => 'comment.list']);
        Route::get('edit_comment/{id}', ['as' => 'comment.getEdit', 'uses' => 'CustomerController@getEditComment', 'middleware' => 'comment.detail']);
        Route::post('edit_comment/{id}', ['as' => 'comment.postEdit', 'uses' => 'CustomerController@postEditComment', 'middleware' => 'comment.reply']);
    });
    //******************************* CONTACT AREA *******************************
    Route::group(['prefix'=>'contact'], function(){
        Route::get('list_contact', ['as' => 'contact.list', 'uses' => 'ContactController@getListContact', 'middleware' => 'contact.list']);
        Route::get('content_contact/{id}', ['as' => 'contact.getDetail', 'uses' => 'ContactController@getContactContent', 'middleware' => 'contact.detail']);
        Route::post('content_contact/{id}', ['as' => 'contact.postDetail', 'uses' => 'ContactController@postContactContent', 'middleware' => 'contact.reply']);
    });
});