<?php

namespace App\Http\Controllers\v1;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;
/**
 * @OA\Info(title="ELSA API", version="1.0")
 */

class Controller extends BaseController
{
    //use AuthorizesRequests, ValidatesRequests;
    use ValidatesRequests;
}