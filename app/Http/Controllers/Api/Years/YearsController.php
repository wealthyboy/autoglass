<?php

namespace App\Http\Controllers\Api\Years;

use App\Http\Controllers\Controller;
use App\Http\Helper;
use Illuminate\Http\Request;
use App\Models\MakeModelYear;
use App\Models\Attribute;


class YearsController extends Controller
{
    public function index(Request $request)
    {
        return Helper::years();
    }

    public function makeModelYearSearch(Request $request)
    {

        $data  = $request->query();
        $cookie = null;
        $type = $this->getType($request);
        $partFitsVehicle = true;
        $cookie = null;
        $catString = null;


        $p = null;

        $data = MakeModelYear::getMakeModelYearSearch($request);


        $res =  response()->json(
            [
                'type' => $request->type,
                'data' => $data,
            ]
        );

        return $res;
    }

    public function saveSelection(Request $request)
    {
        $request->validate([
            'year' => 'required|integer|min:1900|max:2100',
            'make_id' => 'required|integer',
            'model_id' => 'required|integer',
        ]);
        $make = Attribute::find($request->make_id);
        $model = Attribute::find($request->model_id);

        $request->session()->put('year', $request->year);
        $request->session()->put('make_id', $request->make_id);
        $request->session()->put('model_id', $request->model_id);

        $message  = "Congratulations we can fix your " . $request->year . ' '. $make->name . ' ' .$model->name;

        return response()->json(['message' => $message]);
    }

    public function getType(Request $request)
    {
        switch ($request->type) {
            case 'year':
                $response = 'year';
                break;
            case 'make':
                $response = 'make_id';
                break;
            case 'model':
                $response = 'model_id';
                break;
          
       
            case 'clear':
                $response = 'clear';
                break;

            default:
                # code...
                $response = null;
                break;
        }

        return $response;
    }
}
