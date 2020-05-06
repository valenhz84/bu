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

Auth::routes(['verify' => true]);
//Auth::routes(['verify' => true,'register' => false]);

Route::middleware(['auth'])->group(function () {
	Route::get('/', 'TaskController@index')->name('index')->middleware('verified');
	Route::post('/tasks/update_status_task/{id}', 'TaskController@update_status')->name('update_status_task');
	Route::get('/tasks/update_active_task/{id}', 'TaskController@update_active')->name('update_active_task');
	
	Route::post('/tasks/files/tasks_files_store/{id}', 'FileController@store')->name('tasks_files_store');
	Route::post('/tasks/files/{id}', 'FileController@destroy')->name('tasks_files_destroy');
	Route::post('/tasks/comments/tasks_comments_store/{id}', 'CommentController@store')->name('tasks_comments_store');
	Route::post('/tasks/comments/{id}', 'CommentController@destroy')->name('tasks_comments_destroy');
	Route::post('/tasks/update_status_burequest/{id}', 'BURequestController@update_status')->name('update_status_burequest');
	Route::post('/reports/tasks/reports_tasks_store', 'ReportController@store')->name('reports_tasks_store');

	Route::resource('/tasks', 'TaskController')->middleware('verified');
	Route::resource('/requests', 'BURequestController')->middleware('verified');
	Route::resource('/reports', 'ReportController')->middleware('verified');
	//admin
	Route::post('/admin/users/update_role/{id}', 'UserController@update_role')->name('update_role')->middleware('admin');
	Route::get('/admin/periods/update_active/{id}', 'PeriodController@update_active')->name('update_active')->middleware('admin');
	Route::post('admin/files/files_store/{id}', 'AdminFileController@store')->name('files_store')->middleware('admin');
	Route::post('admin/comments/comments_store/{id}', 'AdminCommentController@store')->name('comments_store')->middleware('admin');
	Route::get('/notifications/notifications_store/{id}', 'NotificationController@store')->name('notifications_store')->middleware('admin');
	/*********/
	Route::resource('/admin/roles', 'RoleController')->middleware('admin');
	Route::resource('/admin/users', 'UserController')->middleware('admin');
	Route::resource('/admin/activities', 'ActivitieController')->middleware('admin');
	Route::resource('/admin/periods', 'PeriodController')->middleware('admin');
	
	Route::resource('/admin/assignments', 'AdminAssignmentController')->middleware('admin');
	Route::resource('/admin/files', 'AdminFileController')->middleware('admin');
	Route::resource('/admin/comments', 'AdminCommentController')->middleware('admin');
});