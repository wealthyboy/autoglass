<?php

namespace App\Http\Controllers\Admin\Information;

use App\DataTable\Table;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


class InformationController extends Table
{

	public $deleted_names = 'name';

	public $deleted_specific = 'pages';

	public function builder()
	{
		return Page::query();
	}


	// public function __construct()
	// {
	// 	// $this->middleware('admin', ['except' => ['show']]); 
	// }

	public function  index(Request $request)
	{
		$pages = Page::parents()->get();
		return view('admin.information.index', compact('pages'));
	}

	public function  create(Request $request)
	{
		//User::canTakeAction(User::canCreate);
		$pages = Page::parents()->get();
		return view('admin.information.create', compact('pages'));
	}

	public function  store(Request $request)
	{
		$request->validate([
			'name' => 'required|unique:pages|max:100',
		]);
		$info = new Page;
		$info->name = $request->name;
		$info->description = $request->description;
		$info->sort_order = $request->sort_order;
		$info->link = $request->custom_link;
		$info->meta_title = $request->meta_title;
		//$info->same_page = $request->same_page == 'yes' ? true : false;
		$info->parent_id = $request->parent_id;
		$info->slug = Str::slug($request->name);
		$info->save();
		return redirect()->route('pages.index')->with('status', 'created');
	}


	public function update(Request $request, $id)
	{

		$page = Page::find($id);

		if ( $request->filled('parent_id') ) {

			$request->validate([
				'name' => [
					'required',
					Rule::unique('pages')->where(function ($query) use ($request) {
						$query->where('parent_id', '=', $request->parent_id);
					})->ignore($id)

				],
			]);
		}

		$request->validate([
			'name' => [
				'required',
				Rule::unique('pages')->ignore($id),
			],
		]);


		$page->name = $request->name;
		$page->description = $request->description;
		$page->slug = Str::slug($request->name);
		$page->sort_order = $request->sort_order;
		$page->link = $request->custom_link;
		$page->meta_title = $request->meta_title;
		//$page->same_page = $request->same_page == 'yes' ? true : false;
		$page->parent_id = $request->parent_id;
		$page->save();
		return redirect()->route('pages.index')->with('status', 'created');
	}


	public function  edit(Request $request, $id)
	{   
		$information = Page::find($id);
		$pages = null;
         
		return view('admin.information.edit', compact('information','pages'));
	}
}
