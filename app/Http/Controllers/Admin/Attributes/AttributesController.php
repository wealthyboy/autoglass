<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\DataTable\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AttributeYear;

use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Attribute;
use Illuminate\Validation\Rule;
use App\Http\Helper;


class AttributesController extends Table
{


    public $deleted_names = 'name';

    public $deleted_specific = 'Attributes';


    public function builder()
    {
        return Attribute::query();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents = Attribute::parents()->get();
        $attributes = Attribute::parents()->get();
        $types = Attribute::$types;
        $helper = new Helper;
        return view('admin.attributes.index', compact('attributes', 'helper', 'types', 'parents'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( $request->filled('parent_id') ) {

            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('attributes')->where(function ($query) use ($request) {
                        $query->where('parent_id', '!=', null)
                            ->where('parent_id', $request->parent_id);
                    })
                ],
            ]);

        } else {

            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('attributes')->where(function ($query) {
                        $query->where('parent_id', '=', null);
                    })
                ],
            ]);
        }


        $attribute = new Attribute;
        $attribute->name = $request->name;
        $attribute->sort_order = $request->sort_order;
        $attribute->slug = Str::slug($request->name, '_');
        $attribute->parent_id = $request->parent_id ? $request->parent_id : null;
        $attribute->save();

        //dd($request->years);

        if (!empty($request->years)) {

            foreach ($request->years as $key => $year) {
                $attribute_year = new AttributeYear;
                $attribute_year->year = $year;
                $attribute_year->parent_id = $request->parent_id;
                $attribute_year->attribute_id = $attribute->id;
                $attribute_year->save();
            }
        }

        return redirect()->back();
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
        $attr = Attribute::find($id);
        $attributes = Attribute::parents()->get();
        $types = Attribute::$types;
        $helper = new Helper;
        $years = $attr->attribute_years->pluck('year')->toArray();
        return view('admin.attributes.edit', compact('years','attributes', 'helper', 'attr', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $attribute = Attribute::find($id);
        $attribute->name = $request->name;
        $attribute->sort_order = $request->sort_order;
        $attribute->slug = Str::slug($request->name, '_');
        $attribute->parent_id = $request->parent_id ? $request->parent_id : null;
        $attribute->save();
        $attribute->attribute_years()->delete();
        if (!empty($request->years)) {
            foreach ($request->years as $key => $year) {
                $attribute_year =  new AttributeYear;
                $attribute_year->year = $year;
                $attribute_year->parent_id = $request->parent_id;
                $attribute_year->attribute_id = $attribute->id;
                $attribute_year->save();
            }
        }

        return redirect()->to('/admin/attributes');
    }

    
}
