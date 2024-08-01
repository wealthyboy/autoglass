<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

	protected $fillable = [
        'first_name', 
        'last_name', 
        'phone_number', 
        'email', 
        'address', 
        'address2', 
        'city', 
        'state', 
		'make',
		'model',
		'year',
		'category_id',
		'parent_id',
		'child_id'
        
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

	public function parent_category()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

	public function child_category()
    {
        return $this->belongsTo(Category::class, 'child_id');
    }

    public function getListingData($collection)
	{

		return  $collection->map(function ($appointment) {
				return [
					"Id" => $appointment->id,
					"first_name" => $appointment->first_name,
                    "Last Name" => $appointment->last_name,
					"Email" => $appointment->email,
					"Phone Number" => $appointment->phone_number,
					"Date" => optional($appointment->created_at)->format('m-d-y'),
				];
			 
		});
	}

	public function sortKeys($key)
	{
		$sort =  [
			"Id" => 'id',
			"First Name" => 'first_name',
			"Last Name" => 'first_name',
			"Email" => 'email',
			"Wind Shield" => 'category_id',
            "Phone Number" => 'phone_number',
			"Date Added" => 'created_at',
		];

		return $sort[$key];
	}

	public function selected($collection)
	{
		return  $collection->map(function ($order) {
			return [
				"Status" => $this->status,
			];
		});
	}

}
