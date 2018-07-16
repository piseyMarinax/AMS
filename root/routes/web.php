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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::post('/sidebar', 'LanguageController@setSidebar');

////////////////////// route language //////////////////
Route::post('/language-chooser','LanguageController@changeLanguage');
Route::post('/language/', array(
    'before' => 'csrf',
    'as' => 'language-chooser',
    'uses' => 'LanguageController@changeLanguage'
));

/////////////////// ams customers ////////////////////
Route::group(['prefix' => 'backend'], function() {
	Route::get('/customers/index','CustomerAmsController@getIndex');
	Route::get('/customers/receipt','CustomerAmsController@Outreceipt');
	Route::get('/customers/cview/{id}','CustomerAmsController@custView');
	Route::get('/customers/creceiptmonth/{id}','CustomerAmsController@monthReceipt');
	Route::get('/customers/list','CustomerAmsController@getIndex');
	Route::get('/customers/add','CustomerAmsController@getCusAdd');
	Route::get('/customers/cusedit/{id}','CustomerAmsController@getCusEdit');
	Route::post('/customers/insert','CustomerAmsController@insertCustomer');
	Route::post('/customers/update','CustomerAmsController@getCusEditSave');
	Route::get('/customers/getJsonCus','CustomerAmsController@getJsonCustomer');
	Route::match(['post','get'],'/customers/delete','CustomerAmsController@onDelete');

	Route::get('/setting/customertype','SettingAmsController@getIndex');
});


//ADMINISTRATORS BLOG
Route::group(['prefix' => 'admins'], function() {

	Route::group(['prefix' => 'dept'], function() {
		Route::get('/index','DeptController@getIndex');
		Route::get('/add','DeptController@getDeptAdd');
		Route::post('/insert','DeptController@getDeptAddSave');
		Route::get('/edit/{id}','DeptController@getdeptEdit');
		Route::post('/update','DeptController@updateDataDept');
		Route::get('/getJsonDept','DeptController@getJsonDept');
		Route::post('/delete','DeptController@onDelete');
		/*can use like this if u don't care about get or post
		Route::match(['post','get'],'/delete','DeptController@onDelete');	*/		
	});
	Route::group(['prefix' => 'position'], function() {
		Route::get('/index','FuncController@getIndex');
		Route::get('/add','FuncController@getFuncAdd');
		Route::post('/insert','FuncController@getFuncAddSave');
		Route::get('/edit/{id}','FuncController@getfuncEdit');
		Route::post('/update','FuncController@updateDataFunc');
		Route::get('/getJsonFunc','FuncController@getJsonFunc');
		Route::post('/delete','FuncController@onDelete');
		/*can use like this if u don't care about get or post
		Route::match(['post','get'],'/delete','FuncController@onDelete');	*/		
	});

	Route::group(['prefix' => 'document'], function() {
		Route::get('/index','DocumentController@getIndex');
		Route::get('/document','DocumentController@getdocAdd');
		Route::post('/insert','DocumentController@getDocAddSave');
		Route::get('/edit/{id}','DocumentController@getDocEdit');
		Route::post('/update','DocumentController@updateDataDoc');
		Route::get('/getJsonDoc','DocumentController@getJsonDoc');
		Route::match(['post','get'],'/delete','DocumentController@onDelete');
		/*can use like this if u don't care about get or post
		Route::match(['post','get'],'/delete','FuncController@onDelete');	*/		
	});
	Route::group(['prefix' => 'timework'], function() {
		Route::get('/index','TimeworkController@getIndex');
		Route::get('/timework','TimeworkController@getTimeAdd');
		Route::post('/insert','TimeworkController@getTimeAddSave');
		Route::get('/edit/{id}','TimeworkController@getTimeEdit');
		Route::post('/update','TimeworkController@updateDataTime');
		Route::get('/getJsonTime','TimeworkController@getJsonTime');
		Route::match(['post','get'],'/delete','TimeworkController@onDelete');
		/*can use like this if u don't care about get or post
		Route::match(['post','get'],'/delete','FuncController@onDelete');	*/		
	});

	Route::group(['prefix' => 'staff'], function() {
		Route::get('/index','EmpController@getIndex');
		Route::get('/emplist','EmpController@getIndex');
		Route::get('/add','EmpController@getEmpAdd');
		Route::post('/insert','EmpController@getEmpAddSave');
		Route::get('/edit/{id}','EmpController@getStaffEdit');
		Route::post('/updateSave','EmpController@updateDataEmp');
		Route::get('/getJsonEmp','EmpController@getJsonStaff');
		Route::get('/profilesdetail/{id}','EmpController@getProfileStaff');
		Route::match(['post','get'],'/delete','EmpController@onDelete');

		Route::get('/stfunction/{id}','EmpController@getStaffaddfunction');
		Route::post('/stfunctionSave','EmpController@StaffaddSavefunction');

		Route::get('/stdocument/{id}','EmpController@getStaffaddDocument');
		Route::post('/stdocumentSave','EmpController@StaffaddSavedocument');


		Route::get('/stsalaries/{id}','EmpController@getStaffaddSalary');
		Route::post('/stsalariesSave','EmpController@StaffaddSaveSalary');
		//Route::post('/updateSave','EmpController@updateDataEmp')
		/*can use like this if u don't care about get or post
		Route::match(['post','get'],'/delete','FuncController@onDelete');	*/		
	});


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
});
//END ADMINISTRATORS BLOG