<?php 

Route::group([
    'prefix'=>'modules',
    'namespace'=>'Modules'
], function() {    
    require realpath(base_path() . '/routes/modules.php');    
});

Route::group([
    'prefix'=>'contacts',
    'middleware'=>'auth',
], function() {    
    require realpath(base_path() . '/routes/modules/contacts.php');    
});

Route::group([
    'prefix'=>'priceList',
    'middleware'=>'auth',
], function() {    
    require realpath(base_path() . '/routes/modules/priceList.php');    
});

Route::group([
    'prefix'=>'sellers',
    'middleware'=>'auth',
], function() {    
    require realpath(base_path() . '/routes/modules/sellers.php');    
});

Route::group([
    'prefix'=>'paymentTerms',
    'middleware'=>'auth',
], function() {    
    require realpath(base_path() . '/routes/modules/paymentTerms.php');    
});
