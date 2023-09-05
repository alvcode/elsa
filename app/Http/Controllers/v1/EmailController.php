<?php

namespace App\Http\Controllers\v1;

use App\Contracts\v1\Auth\RegisterActionsContract;
use App\Http\Requests\v1\Auth\RegisterEmailRequest;
use App\Models\v1\User;
use Illuminate\Support\Facades\Hash;

class EmailController extends Controller
{   
    
    
   
    public function confirmEmail()
    {

        return view('emails.confirmEmail');
    }
    
}
