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

///////////////////// route users ///////////////////////////
Route::group(['prefix' => 'user'], function() {
	Route::get('/index','UserInfoController@index');
	Route::get('/jsonUsers','UserInfoController@getJsonUsers');
	Route::get('/add','UserInfoController@add');
	Route::get('/edit/{id}','UserInfoController@edit');
	Route::post('/insert','UserInfoController@insert');
	Route::post('/update','UserInfoController@update');
	Route::get('/reset_pass/{id}','UserInfoController@reset_pass');
	Route::post('/update_pass','UserInfoController@update_pass');
	Route::post('/delete','UserInfoController@onDelete');
});

//full screen
Route::group(['prefix' => 'backend'], function() {
	Route::get('/user/index','UserInfoController@indexs');
	Route::get('/user/list','UserInfoController@indexs');
	Route::get('/user','UserInfoController@indexs');
	Route::get('/user/jsonUsers','UserInfoController@getJsonUsers');
	Route::get('/user/jsonUserslist','UserInfoController@getJsonUserList');
	Route::get('/user/add','UserInfoController@add');
	Route::get('/user/edit/{id}','UserInfoController@edit');
	Route::post('/user/insert','UserInfoController@insert');
	Route::post('/user/update','UserInfoController@update');
	Route::get('/user/reset_pass/{id}','UserInfoController@reset_pass');
	Route::post('/user/update_pass','UserInfoController@update_pass');
	Route::post('/user/delete','UserInfoController@onDelete');
});
// end full screen

///////////////////// route group users ///////////////////////////
Route::group(['prefix' => 'group'], function() {
	Route::get('/index','GroupController@index');
	Route::get('/jsonGroups','GroupController@getJsonGroups');
	Route::get('/add','GroupController@add');
	Route::get('/edit/{id}','GroupController@edit');
	Route::post('/insert','GroupController@insert');
	Route::post('/update','GroupController@update');
	Route::get('/reset_pass/{id}','GroupController@reset_pass');
	Route::post('/update_pass','GroupController@update_pass');
	Route::post('/delete','GroupController@onDelete');
});

///////////////////// route tax ///////////////////////////
Route::group(['prefix' => 'tax'], function() {
	Route::get('/index','TaxController@index');
	Route::get('/jsonTaxes','TaxController@getJsonTaxes');
	Route::get('/add','TaxController@add');
	Route::get('/edit/{id}','TaxController@edit');
	Route::post('/insert','TaxController@insert');
	Route::post('/update','TaxController@update');
	Route::post('/delete','TaxController@onDelete');
});

///////////////////// route exchange rate ///////////////////////////
Route::group(['prefix' => 'exchange'], function() {
	Route::get('/index','ExchangeRateController@index');
	Route::get('/jsonExchangeRate','ExchangeRateController@getJsonExchangeRate');
	Route::get('/add','ExchangeRateController@add');
	Route::get('/edit/{id}','ExchangeRateController@edit');
	Route::post('/insert','ExchangeRateController@insert');
	Route::post('/update','ExchangeRateController@update');
	Route::post('/delete','ExchangeRateController@onDelete');
});

///////////////////// route warehouse ///////////////////////////
Route::group(['prefix' => 'warehouse'], function() {
	Route::get('/index','WarehouseController@index');
	Route::get('/jsonWarehouse','WarehouseController@getJsonWarehouses');
	Route::get('/add','WarehouseController@add');
	Route::get('/edit/{id}','WarehouseController@edit');
	Route::post('/insert','WarehouseController@insert');
	Route::post('/update','WarehouseController@update');
	Route::post('/delete','WarehouseController@onDelete');
});

///////////////////// route peryment term ///////////////////////////
Route::group(['prefix' => 'paymentterm'], function() {
	Route::get('/index','PaymentTermController@index');
	Route::get('/jsonPaymentTerms','PaymentTermController@getJsonPaymentTerms');
	Route::get('/add','PaymentTermController@add');
	Route::get('/edit/{id}','PaymentTermController@edit');
	Route::post('/insert','PaymentTermController@insert');
	Route::post('/update','PaymentTermController@update');
	Route::post('/delete','PaymentTermController@onDelete');
});

///////////////////// route unit convertion ///////////////////////////
Route::group(['prefix' => 'unit'], function() {
	Route::get('/index','UnitConvertController@index');
	Route::get('/jsonUnits','UnitConvertController@getJsonUnits');
	Route::get('/add','UnitConvertController@add');
	Route::get('/edit/{id}','UnitConvertController@edit');
	Route::post('/insert','UnitConvertController@insert');
	Route::post('/update','UnitConvertController@update');
	Route::post('/delete','UnitConvertController@onDelete');
});

///////////////////// route customer ///////////////////////////
Route::group(['prefix' => 'customer'], function() {
	Route::get('/index','CustomerController@index');
	Route::get('/jsonCustomers','CustomerController@getJsonCustomers');
	Route::get('/add','CustomerController@add');
	Route::get('/edit/{id}','CustomerController@edit');
	Route::post('/insert','CustomerController@insert');
	Route::post('/update','CustomerController@update');
	Route::post('/delete','CustomerController@onDelete');
});

///////////////////// route supplier ///////////////////////////
Route::group(['prefix' => 'supplier'], function() {
	Route::get('/index','SupplierController@index');
	Route::get('/jsonSuppliers','SupplierController@getJsonSuppliers');
	Route::get('/add','SupplierController@add');
	Route::get('/edit/{id}','SupplierController@edit');
	Route::post('/insert','SupplierController@insert');
	Route::post('/update','SupplierController@update');
	Route::post('/delete','SupplierController@onDelete');
});

///////////////////// route expense category ///////////////////////////
Route::group(['prefix' => 'expensecat'], function() {
	Route::get('/index','ExpenseCategoryController@index');
	Route::get('/jsonExpenseCategorys','ExpenseCategoryController@getJsonExpenseCategoryes');
	Route::get('/add','ExpenseCategoryController@add');
	Route::get('/edit/{id}','ExpenseCategoryController@edit');
	Route::post('/insert','ExpenseCategoryController@insert');
	Route::post('/update','ExpenseCategoryController@update');
	Route::post('/delete','ExpenseCategoryController@onDelete');
});

///////////////////// route items ///////////////////////////
Route::group(['prefix' => 'items'], function() {
	Route::get('/index','ItemsController@index');
	Route::get('/jsonItems','ItemsController@getJsonItems');
	Route::get('/add','ItemsController@add');
	Route::get('/edit/{id}','ItemsController@edit');
	Route::post('/insert','ItemsController@insert');
	Route::post('/update','ItemsController@update');
	Route::post('/delete','ItemsController@onDelete');
	Route::post('/getUnitPurchase','ItemsController@getUnitPurchase');
});

///////////////////// route supplier items ///////////////////////////
Route::group(['prefix' => 'supitems'], function() {
	Route::get('/index','SupplierItemsController@index');
	Route::get('/jsonSuplierItems','SupplierItemsController@getJsonSupplierItems');
	Route::get('/add','SupplierItemsController@add');
	Route::get('/edit/{id}','SupplierItemsController@edit');
	Route::post('/insert','SupplierItemsController@insert');
	Route::post('/update','SupplierItemsController@update');
	Route::post('/delete','SupplierItemsController@onDelete');
	Route::post('/getUnitPurchase','SupplierItemsController@getUnitPurchase');
});

///////////////////// route unit salling price ///////////////////////////
Route::group(['prefix' => 'unitprice'], function() {
	Route::get('/index','UnitPriceController@index');
	Route::get('/jsonUnitPrices','UnitPriceController@getJsonUnitPrices');
	Route::get('/add','UnitPriceController@add');
	Route::get('/edit/{id}','UnitPriceController@edit');
	Route::post('/insert','UnitPriceController@insert');
	Route::post('/update','UnitPriceController@update');
	Route::post('/delete','UnitPriceController@onDelete');
	Route::post('/getUnitPurchase','UnitPriceController@getUnitPurchase');
});

///////////////////// route price books ///////////////////////////
Route::group(['prefix' => 'pricebook'], function() {
	Route::get('/index','PriceBookController@index');
	Route::get('/jsonPriceBooks','PriceBookController@getJsonPriceBooks');
	Route::get('/add','PriceBookController@add');
	Route::get('/edit/{id}','PriceBookController@edit');
	Route::post('/insert','PriceBookController@insert');
	Route::post('/update','PriceBookController@update');
	Route::post('/delete','PriceBookController@onDelete');
});

///////////////////// route discount rule ///////////////////////////
Route::group(['prefix' => 'discount'], function() {
	Route::get('/index','DiscountRuleController@index');
	Route::get('/jsonDiscountRules','DiscountRuleController@getJsonDiscountRules');
	Route::get('/add','DiscountRuleController@add');
	Route::get('/edit/{id}','DiscountRuleController@edit');
	Route::get('/assign/{id}/{type}','DiscountRuleController@assign');
	Route::post('/insert','DiscountRuleController@insert');
	Route::post('/update','DiscountRuleController@update');
	Route::post('/delete','DiscountRuleController@onDelete');
	Route::post('/status','DiscountRuleController@onStatus');
	Route::post('/getItemsDiscount','DiscountRuleController@getItemsDiscount');
});