<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'welcome', 'uses' => 'WelcomeController@welcome']);

/////////////////////////////////////////Admin Routes/////////////////////////////////////////////
Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace'=>'Admin'], function () {
    /***********************Index routes**************************/
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminIndexController@index']);
    /***********************Index routes**************************/


    /***********************technicians routes**************************/
    Route::get('techniciens', ['as' => 'admin.technicians', 'uses' => 'AdminTechsCrudController@technicians']);

    Route::get('techniciens/{id}', ['as' => 'admin.techDetails', 'uses' => 'AdminTechsCrudController@technician']);

    Route::get('techniciens/add', ['as' => 'admin.addTechnician', 'uses' => 'AdminTechsCrudController@add']);

    Route::post('techniciens/create', ['as' => 'admin.createTechnician', 'uses' => 'AdminTechsCrudController@create']);

    Route::patch('techniciens/{id}', ['as' => 'admin.updateTechnician', 'uses' => 'AdminTechsCrudController@update']);

    Route::patch('technician/{id}/define_admin', ['as' => 'admin.makeAdmin', 'uses' => 'AdminTechsCrudController@makeAdminn']);

    Route::patch('technician/{id}/', ['as' => 'admin.unmakeAdmin', 'uses' => 'AdminTechsCrudController@unmakeAdminn']);

    Route::delete('technician/{id}', ['as' => 'admin.deleteTechnician', 'uses' => 'AdminTechsCrudController@delete']);
    /***********************technicians routes**************************/

    /***********************clients routes**************************/
    Route::get('clients', ['as' => 'admin.clients', 'uses' => 'AdminClientsController@browse']);

    Route::get('clients/{id}/orders', ['as' => 'admin.clientOrders', 'uses' => 'AdminClientsController@orders']);

    Route::post('clients', ['as' => 'admin.addClient', 'uses' => 'AdminClientsController@create']);

    Route::patch('clients/{id}', ['as' => 'admin.updateClient', 'uses' => 'AdminClientsController@update']);

    Route::delete('clients/{id}', ['as' => 'admin.deleteClient', 'uses' => 'AdminClientsController@delete']);
    /***********************clients routes**************************/


    /***********************orders routes**************************/
    Route::get('orders', ['as' => 'admin.orders', 'uses' => 'AdminOrdersController@browse']);

    Route::get('orders/new', ['as' => 'admin.orderNew', 'uses' => 'AdminOrdersController@new']);

    Route::get('orders/closed', ['as' => 'admin.order.filter.closed', 'uses' => 'AdminOrdersFilters@closed']);

    Route::get('orders/not_closed', ['as' => 'admin.order.filter.notClosed', 'uses' => 'AdminOrdersFilters@notClosed']);

    Route::get('orders/verified', ['as' => 'admin.order.filter.verified', 'uses' => 'AdminOrdersFilters@verified']);

    Route::get('orders/not_verified', ['as' => 'admin.order.filter.notVerified', 'uses' => 'AdminOrdersFilters@notVerified']);

    Route::get('orders/payed', ['as' => 'admin.order.filter.payed', 'uses' => 'AdminOrdersFilters@payed']);

    Route::get('orders/not_payed', ['as' => 'admin.order.filter.notPayed', 'uses' => 'AdminOrdersFilters@notPayed']);

    Route::get('orders/{id}', ['as' => 'admin.orderDetails', 'uses' => 'AdminOrdersController@preview']);

    Route::get('orders/{id}/invoice', ['as' => 'admin.invoice', 'uses' => 'AdminOrdersController@invoice']);

    Route::post('orders/create', ['as' => 'admin.orderCreate', 'uses' => 'AdminOrdersController@create']);

    Route::patch('orders/{id}', ['as' => 'admin.orderUpdate', 'uses' => 'AdminOrdersController@update']);

    Route::patch('orders/{id}/set_as_payed', ['as' => 'admin.setOrderPayed', 'uses' => 'AdminOrdersController@setAsPayed']);

    Route::patch('orders/{id}/set_as_closed', ['as' => 'admin.setOrderClosed', 'uses' => 'AdminOrdersController@setAsClosed']);

    Route::patch('order/verify/{id}', ['as' => 'admin.verifyOrder', 'uses' => 'AdminOrdersController@verifyOrder']);

    Route::delete('order/{id}', ['as' => 'admin.orderDelete', 'uses' => 'AdminOrdersController@delete']);
    /***********************orders routes**************************/


    /***********************promotions routes**************************/
    Route::get('promotions', ['as' => 'admin.promotions', 'uses' => 'AdminPromotionsCrudController@browse']);

    Route::post('promotions', ['as' => 'admin.promotions.create', 'uses' => 'AdminPromotionsCrudController@create']);

    Route::patch('promotions/{id}', ['as' => 'admin.promotions.update', 'uses' => 'AdminPromotionsCrudController@update']);

    Route::delete('promotions/{id}', ['as' => 'admin.promotions.delete', 'uses' => 'AdminPromotionsCrudController@delete']);
    /***********************promotions routes**************************/
});
/////////////////////////////////////////Admin Routes/////////////////////////////////////////////



/////////////////////////////////////////Users Routes/////////////////////////////////////////////
Route::group(['prefix' => 'users', 'middleware' => ['auth', 'authacc'], 'namespace' => 'Client'], function () {

    Route::get('{id}', ['as' => 'user.profile', 'uses' => 'UsersCrudController@profile']);

    Route::patch('{id}', ['as' => 'user.update', 'uses' => 'UsersCrudController@update']);

    Route::get('{id}/orders', ['as' => 'user.orders', 'uses' => 'UsersCrudController@orders']);
});
/////////////////////////////////////////Users Routes/////////////////////////////////////////////


/////////////////////////////////////////Orders Routes/////////////////////////////////////////////
Route::group(['prefix' => 'orders', 'middleware' => ['auth'], 'namespace' => 'Client'], function () {
    Route::get('send', ['as' => 'order.send', 'uses' => 'OrdersCrudController@send']);

    Route::get('new', ['as' => 'order.new', 'uses' => 'OrdersCrudController@new']);

    Route::get('{id}', ['as' => 'order.preview', 'uses' => 'OrdersCrudController@preview']);

    Route::post('create', ['as' => 'order.create', 'uses' => 'OrdersCrudController@create']);

    Route::patch('{id}', ['as' => 'order.update', 'uses' => 'OrdersCrudController@update']);

    Route::delete('{id}', ['as' => 'order.delete', 'uses' => 'OrdersCrudController@delete']);

});
/////////////////////////////////////////Orders Routes/////////////////////////////////////////////


/////////////////////////////////////////Discussions Routes/////////////////////////////////////////////
Route::group(['prefix' => 'discussion', 'middleware'=>'auth', 'namespace' => 'Client'], function () {
    Route::post('{id}/reply', ['as' => 'discussion.reply', 'uses' => 'DiscussionsCrudController@reply']);
});
/////////////////////////////////////////Discussions Routes/////////////////////////////////////////////
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
