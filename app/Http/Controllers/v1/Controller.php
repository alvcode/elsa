<?php

namespace App\Http\Controllers\v1;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

class Controller extends BaseController
{
    //use AuthorizesRequests, ValidatesRequests;
    use ValidatesRequests;
}