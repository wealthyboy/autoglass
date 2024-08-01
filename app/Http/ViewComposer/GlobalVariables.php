<?php

namespace App\Http\ViewComposer;

use App\Models\User;
use Illuminate\View\View;
use Auth;
use App\Category;
use App\Cart;
use App\SystemSetting;


use Illuminate\Support\Facades\Cache;

class   GlobalVariables
{

	public function compose(View $view)
	{
		$system_settings = SystemSetting::first();
		$view->with([
			'system_settings' => $system_settings,
		]);
	}
}
