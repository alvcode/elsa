<?php

namespace App\Http\Controllers\v1;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //use AuthorizesRequests, ValidatesRequests;
    use ValidatesRequests;
}