<?php

/*
|--------------------------------------------------------------------------
| Admin Settings
|--------------------------------------------------------------------------
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Posts per page for pagination
    |--------------------------------------------------------------------------
    */

    'posts_per_page' => env('ADMIN_DEFAULT_PAGES_PER_PAGE', 100),
    'true_false' => [
        '0' => 'False',
        '1' => 'True'
    ]

];
