<?php

namespace App\Http\Controllers\Admin\Category;

use App\DataTable\Table;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Http\Helper;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\Attribute;
use App\Models\BrandCategory;

class CategoryController extends Table
{


    public $deleted_names = 'name';

    public $deleted_specific = 'Categories';


    public function builder()
    {
        return Category::query();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::parents()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //User::canTakeAction(User::canCreate);
        return view('admin.category.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        if ($request->filled('parent_id')) {

            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('categories')->where(function ($query) use ($request) {
                        $query->where('parent_id', '!=', null)
                            ->where('parent_id', $request->parent_id);
                    })

                ],
            ]);

        } else {
            $slug =  Str::slug($request->name, '_');
            //define validation 
            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('categories')->where(function ($query) {
                        $query->where('parent_id', '=', null);
                    })

                ],
            ]);
        }


       // $slug = $this->makeSlug($request->parent_id, $request->name);
        $category = new Category;
        $category->name = $request->name;
       // $category->image_custom_link = $request->image_custom_link;
       // $category->link = $request->link;
       // $category->banner_image = $request->banner_image;
        $category->image = $request->image;
       // $category->meta_description = $request->meta_description;
//        $category->title = $request->meta_title;
        $category->slug = Str::slug($request->name);
        $category->sort_order = $request->sort_order;
        $category->is_repairable = $request->is_repairable;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()->back();
    }


    public function makeSlug($parent_id, $name)
    {
        //Tempral solution
        $cat = $parent_id ? Category::find($parent_id) : null;
        if (null !== $cat) {
            if ($cat->parent_id) {
                $parent = Category::find($cat->parent_id);
                return  Str::slug($parent->name . ' ' . $cat->name . ' ' . $name);
            }
            return $slug = null !== $cat ? Str::slug($cat->name . ' ' . $name) : Str::slug($name);
        }
        return str_slug($name);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // User::canTakeAction(User::canUpdate);
        $cat = Category::find($id);
        $categories = Category::parents()->get();
        return view('admin.category.edit', compact('cat', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $rest
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $category = Category::find($id);

        if ($request->filled('parent_id')) {

            $categoryId = Category::find($request->parent_id);

            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('categories')->where(function ($query) use ($request, $category) {
                        $query->where('parent_id', '=', $request->parent_id);
                    })->ignore($id)

                ],
            ]);
        }

        $request->validate([
            'name' => [
                'required',
                Rule::unique('categories')->where(function ($query) use ($id) {
                    $query->where('parent_id', '=', null);
                })->ignore($id)
            ],
        ]);

        // dd($request->all());


        //$slug = $this->makeSlug($request->parent_id, $request->name);
        $category->name = $request->name;
        $category->sort_order = $request->sort_order;
      //  $category->banner_image = $request->banner_image;
       // $category->link = $request->link;
       // $category->is_active = $request->is_active ? 1 : 0;
        $category->parent_id = $request->parent_id;
        $category->description = $request->description;
        $category->is_repairable = $request->is_repairable;


       // $category->image_custom_link = $request->image_custom_link;
        $category->image = $request->image;
      //  $category->text_color = $request->text_color;
       // $category->meta_description = $request->meta_description;
       // $category->search_type = $request->search_type;
       // $category->keywords = $request->keywords;
       // $category->title = $request->meta_title;
       // $category->is_featured = $request->is_featured ? 1 : 0;
       $category->slug = Str::slug($request->name);
       $category->save();

       dd($category);

        //Log Activity
        // (new Activity)->Log("Updated  Category {$request->name} ");

        return redirect()->to('/admin/category');
    }


    public static function undo(Request $request)
    {
        $file = basename($request->image_url);

        if (file_exists(public_path('images/category/' . $file))) {
            unlink(public_path('images/category/' . $file));
            unlink(public_path('images/category/m/' . $file));
            unlink(public_path('images/category/tn/' . $file));
            $category = Category::find($request->image_id);
            if ($category) {
                $category->image = null;
                $category->save();
            }
            return response(null, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
}
