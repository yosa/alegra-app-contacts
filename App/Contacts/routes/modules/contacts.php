<?php 

Route::post('/', 'ContactsController@create')->middleware('gate:task.contacts.contacts.create');
Route::post('delete', 'ContactsController@delete')->middleware('gate:task.contacts.contacts.delete');
Route::post('update', 'ContactsController@update')->middleware('gate:task.contacts.contacts.update');
Route::post('activate', 'ContactsController@activate')->middleware('gate:task.contacts.contacts.activate');
Route::post('deactivate', 'ContactsController@deactivate')->middleware('gate:task.contacts.contacts.deactivate');
Route::get('create', 'ContactsController@create')->middleware('gate:task.contacts.contacts.create');
Route::post('update', 'ContactsController@update')->middleware('gate:task.contacts.contacts.update');

Route::get('/', 'ContactsController@paging')->middleware('gate:task.contacts.contacts.paging');
Route::get('view', 'ContactsController@view')->middleware('gate:task.contacts.contacts.view.access');
Route::get('update', 'ContactsController@update')->middleware('gate:task.contacts.contacts.update.access');
Route::get('add', 'ContactsController@add')->middleware('gate:task.contacts.contacts.add.access');
Route::get('report/{id}/{format?}', 'ContactsController@report')->middleware('gate:task.contacts.contacts.report');
