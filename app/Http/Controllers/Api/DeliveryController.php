<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDeliveryRequest;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth:sanctum']);
    }


    /*
     * funtion to store delivery to db
     */
    public function store(CreateDeliveryRequest $request)
    {

        $delivery = new Delivery();
        $delivery->recipient_address =$request['recipient_address'];
        $delivery->sender_address = $request['sender_address'];
        $delivery->user()->associate($request->user());
        $delivery->add_info =$request['add_info'];
        $delivery->save();
        return  "new delivery created";

    }
}
