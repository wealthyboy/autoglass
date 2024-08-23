<?php

namespace App\Http\Controllers\WebHook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebHookController extends Controller
{

    public function gitHub()
    {
        $output = shell_exec('sh /home/forge/autoglass.ng');
        return  $output;
    }
  
}
