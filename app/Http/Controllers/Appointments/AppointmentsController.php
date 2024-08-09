<?php

namespace App\Http\Controllers\Appointments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\MakeModelYear;
use App\Models\Appointment;


use App\Models\Attribute;
use App\Notifications\AppointmentsNotification;


class AppointmentsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $categories = Category::parents()->with('children')->orderBy('sort_order', 'asc')->get();
        return Inertia::render('Appointment', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $validated['category_id']= session('child_id');
        $validated['parent_id']= session('parent_id');
        $validated['child_id']= session('child_id');
        $validated['make'] = session('make');
        $validated['model'] = session('model');
        $validated['year'] = session('year');
        $validated['comment'] = $request->comment;

        $appointment = Appointment::create($validated);

        try {
            \Notification::route('mail', $validated['email'])
                ->notify(new AppointmentsNotification($validated));
        } catch (\Exception $e) {
           // return response()->json(['error' => $e->getMessage()], 500);
        }

        // Return a response
        return response()->json(['message' => 'Form submitted successfully!']);
    
    }


    public function makeModelYearSearch(Request $request)
    {

        $data  = $request->query();
        $type = $this->getType($request);
        $data = MakeModelYear::getMakeModelYearSearch($request);

        $res =  response()->json(
            [
                'type' => $request->type,
                'data' => $data,
            ]
        );

        return $res;
    }

    public function setCategory(Request $request)
    {
       
        $request->session()->put('parent_id', $request->parent_id);
        $request->session()->put('child_id', $request->child_id);
        $message = "Next";
        $parent = Category::find($request->parent_id)->name;
        $child = optional(Category::find($request->child_id))->name;

        return response()->json(['message' => $message, 'parent' => $parent, 'child' => $child ]);   
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
        $request->session()->put('make', $make->name);
        $request->session()->put('model', $model->name);
        $car = $request->year . ' '. $make->name . ' ' .$model->name;

        $message  =  $car;

        return response()->json(['message' => $car, "car" => $car ]);
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
