<?php 

Route::group([
    'prefix'=>'contacts',
], function() {    
    require realpath(base_path() . '/routes/modules/contacts.php');    
});
