<?php 

Route::get('/', 'SellersController@paging')->middleware('gate:task.contacts.sellers.paging');
