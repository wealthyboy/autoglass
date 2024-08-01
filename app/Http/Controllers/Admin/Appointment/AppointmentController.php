<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTable\Table;
use App\Models\Appointment;


class AppointmentController extends  Table
{
    
    public $link = '/admin/appointments';

	public $deleted_names = 'name';

	public $deleted_specific = 'locations';

	public function __construct()
	{
		parent::__construct();
	}
 
	public function builder()
	{
		return Appointment::query();
	}

	public function index()
	{
		$appointments = Appointment::with('category')->orderBy('created_at', 'desc')->paginate(150);
		$appointments = $this->getColumnListings(request(), $appointments);
		return view('admin.appointments.index', compact('appointments'));
	}


	public function routes()
	{
		return [
			'edit' =>  [
				'admin.appointments.edit',
				'appointment'
			],
			'update' => null,
			'show' => null,
			'destroy' =>  [
				'admin.appointments.destroy',
				'appointment'
			],
			'create' => [
				'admin.appointments.create'
			],
			'index' => null
		];
	}

	public function unique()
	{
		return [
			'show' => true,
			'right' => false,
			'edit' => false,
			'search' => true,
			'add' => false,
			'delete' => false,
			'destroy' => true,
			'export' => true,
			'order' => false,
			'export_name' => 'AppointmentsExport'
		];
	}



	public function show($id)
	{

		$appointment = Appointment::find($id);
		return view('admin.appointments.show', compact('appointment'));
	}


	public function showData($id)
	{
		$obj =  $this->builder->find($id);

		return [
			'customer' => [
				"Full Name" => null !== $obj->user ?  optional($obj->user)->fullname() :  optional($obj)->fullName(),
				"Phone Number" =>  null !== $obj->user ?  optional($obj->user)->phone_number :  optional($obj)->phone_number,
				"Email" => null !== $obj->user ?  optional($obj->user)->email :  optional($obj)->email,
				"Date Joined" => null !== $obj->user ? optional($obj->user)->created_at->format('d-m-y') :  optional($obj)->created_at->format('d-m-y')
			],
			'Order' => [
				"Date Added" => $obj->created_at,
				"Payment Type" => $obj->payment_type,
				"Shipping" => Helper::currencyWrapper($obj->shipping_price),
			],
		];
	}


	public function create(Request $request)
	{
		//User::canTakeAction(User::canCreate);
		return view('admin.orders.create');
	}


	public function subTotal($order)
	{
		$total = DB::table('ordered_products')->select(DB::raw('SUM(ordered_products.price*ordered_products.quantity) as items_total'))->where('order_id', $order->id)->get();
		return $sub_total = $total[0]->items_total ?? '0.00';
	}


}
