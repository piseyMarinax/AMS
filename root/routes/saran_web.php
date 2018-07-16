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

/////////////////// Item Category ////////////////////
Route::group(['prefix' => 'category'], function() {
	Route::get('/index','CategoryController@getIndex');
	Route::get('/add','CategoryController@getAdd');
	Route::get('/edit/{id}','CategoryController@getEdit');
	Route::post('/insert','CategoryController@insertData');
	Route::post('/update/{id}','CategoryController@updateData');
	Route::get('/list','CategoryController@getJsonList');
	Route::post('/delete','CategoryController@getDelete');
});
Route::group(['prefix' => 'purchase/purchase-order'], function() {
	Route::get('/','PurchaseController@getIndex');
	Route::get('/edit/{id}','PurchaseController@getEdit');
	Route::post('/insert','PurchaseController@insertData');
	Route::post('/update/{id}','PurchaseController@updateData');
	Route::get('/list','PurchaseController@getJsonList');
	Route::post('/delete','PurchaseController@getDelete');
});
Route::group(['prefix' => 'setting'], function() {
	Route::group(['prefix' => 'tax'], function() {
		Route::get('/','TaxController@getIndex');
		Route::get('/add','TaxController@getAdd');
		Route::get('/edit/{id}','TaxController@getEdit');
		Route::post('/insert','TaxController@insertData');
		Route::get('/list','TaxController@getJsonList');
		Route::post('/delete','TaxController@getDelete');
	});
	Route::group(['prefix' => 'class'], function() {
		Route::get('/','ClassController@getIndex');
		Route::get('/add','ClassController@getAdd');
		Route::get('/edit/{id}','ClassController@getEdit');
		Route::post('/insert','ClassController@insertData');
		Route::get('/list','ClassController@getJsonList');
		Route::post('/delete','ClassController@getDelete');
	});
	Route::get('config','SettingController@getIndexConfig');
	Route::post('config/insert','SettingController@getInsertConfig');
});
Route::group(['prefix' => 'accounting'], function() {
	Route::post('class-data','ChartAccountController@insertClass');
	Route::group(['prefix' => 'chart_account'], function() {
		Route::get('/index','ChartAccountController@getIndex');
		Route::get('/type-account','ChartAccountController@getTypeAccountIndex');
		Route::get('/type-account/add','ChartAccountController@getTypeAccountAdd');
		Route::post('/type-account/insert','ChartAccountController@getTypeAccountInsertData');
		Route::get('/type-account/edit/{id}','ChartAccountController@getTypeAccountEdit');
		Route::post('/type-account/update','ChartAccountController@updateDataTypeAccount');
		Route::post('/type-account/delete','ChartAccountController@getDeleteTypeAccount');
		Route::get('/type-account/list','ChartAccountController@getJsonListTypeAccount');
		Route::group(['prefix' => 'chart_accounting'], function() {
			Route::get('/','ChartAccountController@getIndexChartAccount');
			Route::get('/add','ChartAccountController@getAdd');
			Route::get('/edit/{id}','ChartAccountController@getEdit');
			Route::post('/insert','ChartAccountController@insertData');
			Route::post('/update/','ChartAccountController@updateData');			
			Route::post('/delete','ChartAccountController@getDelete');
			Route::get('/list','ChartAccountController@getJsonList');
		});		
	});
	Route::group(['prefix' => 'income'], function(){
		Route::get('/index','IncomeController@getIndex');
		Route::get('/add','IncomeController@getAdd');
		Route::get('/edit/{id}','IncomeController@getEdit');
		Route::post('/insert','IncomeController@insertData');
		Route::post('/update/','IncomeController@updateData');			
		Route::post('/delete','IncomeController@getDelete');
		Route::get('/list','IncomeController@getJsonList');
		Route::get('/getDetailData/{id}','IncomeController@getJsonListDetail');
	});
	Route::group(['prefix' => 'expense'], function(){
		Route::get('/calulate/{id}','ExpenseController@getCalulate');
		Route::get('/index','ExpenseController@getIndex');
		Route::get('/add','ExpenseController@getAdd');
		Route::get('/add','ExpenseController@getAdd');
		Route::get('/edit/{id}','ExpenseController@getEdit');
		Route::post('/insert','ExpenseController@insertData');
		Route::post('/update/','ExpenseController@updateData');			
		Route::post('/delete','ExpenseController@getDelete');
		Route::get('/list','ExpenseController@getJsonList');
		Route::get('/getDetailData/{id}','ExpenseController@getJsonListDetail');
	});
	Route::group(['prefix' => 'journal_entry'], function(){
		Route::get('/index','JournalEntryController@getIndex');
		Route::get('/add','JournalEntryController@getAdd');
		Route::get('/edit/{id}','JournalEntryController@getEdit');
		Route::post('/insert','JournalEntryController@insertData');
		Route::post('/update/','JournalEntryController@updateData');			
		Route::post('/delete','JournalEntryController@getDelete');
		Route::get('/list','JournalEntryController@getJsonList');
		Route::get('/getDetailData/{id}','JournalEntryController@getJsonListDetail');
	});
	Route::group(['prefix' => 'account_receivable'], function(){
		Route::get('/index','AccountReceiableController@getIndex');
		Route::get('/add','AccountReceiableController@getAdd');
		Route::get('/edit/{id}','AccountReceiableController@getEdit');
		Route::post('/insert','AccountReceiableController@insertData');
		Route::post('/update/','AccountReceiableController@updateData');			
		Route::post('/delete','AccountReceiableController@getDelete');
		Route::get('/list','AccountReceiableController@getJsonList');
		Route::get('/getDetailData/{id}','AccountReceiableController@getJsonListDetail');
		Route::get('/listbalance/{id}','AccountReceiableController@getJsonListBalance');
		////////////////////////Payment Account Payment ////////////////////////////////////
		Route::get('payment','AccountReceiableController@getAddPayment');
		Route::get('payment/{id}','AccountReceiableController@getAddPaymentCustomer');
	});
	Route::group(['prefix' => 'account-payable'], function(){
		Route::get('/index','IncomeController@getIndex');
		Route::get('/add','IncomeController@getAdd');
		Route::get('/edit/{id}','IncomeController@getEdit');
		Route::post('/insert','IncomeController@insertData');
		Route::post('/update/','IncomeController@updateData');			
		Route::post('/delete','IncomeController@getDelete');
		Route::get('/list','IncomeController@getJsonList');
	});
	Route::group(['prefix' => 'income-statement'], function(){
		Route::match(['GET','POST'],'/index','JournalController@getIncomeStatement');
		Route::get('/Revenue','JournalController@getDataRevenue');
		Route::get('/Expense','JournalController@getDataExpense');
	});
	Route::group(['prefix' => 'cash_flow'], function(){
		Route::match(['GET','POST'],'/index','JournalController@getCashFlow');
	});
	Route::group(['prefix' => 'balance-sheet'], function(){
		Route::match(['GET','POST'],'/index','JournalController@getBalanceSheet');
		Route::get('/Asset','JournalController@getDataAsset');
		Route::get('/Libilities','JournalController@getDataLibilities');
		Route::get('/Equity','JournalController@getDataEquity');
	});
	Route::group(['prefix' => 'journal'], function(){
		Route::match(['GET','POST'],'/index','JournalController@getJournalData');
		Route::get('listjournal','JournalController@getListJournalData');
	});
});
/*
Route::group(['prefix' => 'admins'], function() {
	Route::get('/absentt','AdsentController@getIndex');
	Route::get('/absentt/add','AdsentController@getFuncAdd');
	Route::post('absentt/insert','AdsentController@insertData');
	//////////////////////////////////////////////////////////////
	Route::get('/absentt/type','AdsentTypeController@getFuncAdd');	
	Route::post('/absentttype/insert','AdsentTypeController@insertDataType');
	Route::get('/absentt/listtype','AdsentTypeController@getJsonList');
	Route::post('/absenttType/delete','AdsentTypeController@getDelete');
	Route::get('/absentttype/edit/{id}','AdsentTypeController@getEdit');
	Route::post('/absentttype/update','AdsentTypeController@updateData');
});*/
