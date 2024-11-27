<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PwdController extends Controller
{
    public function generate(Request $request)
    {
        include_once base_path('phpPass/password.php');
    }
}

?>