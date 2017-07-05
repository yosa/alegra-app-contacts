<?php 

Route::get('/', 'PriceListController@paging')->middleware('gate:task.contacts.priceList.paging');
