<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //use AuthorizesRequests, ValidatesRequests;
    use ValidatesRequests;
}