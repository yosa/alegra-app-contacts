<?php 

Route::get('/', 'PaymentTermsController@paging')->middleware('gate:task.contacts.paymentTerms.paging');
