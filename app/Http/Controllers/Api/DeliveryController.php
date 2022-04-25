<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDeliveryRequest;
use App\Http\Resources\DeliveryResource;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{


    public function __construct()
    {

        $this->middleware(['auth:sanctum'])->only('store', 'update', 'index');
    }


    public function index(Request $request)
    {
        $deliveries = Delivery::where('user_id', $request->user()->id)->get();
        return $deliveries;
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
        return  response()->json(['delivery_id' => $delivery->id]);

    }

    /*
      * function to retrieve delivery details by id
     */
    public function show(Delivery $delivery)
    {
        return new DeliveryResource($delivery);

    }

    /*
     * function to update delivery
     *
     */

    public function update (CreateDeliveryRequest $request, Delivery $delivery)
    {

        $delivery->recipient_address  = $request->get('recipient_address',  $delivery->recipient_address);
        $delivery->sender_address  = $request->get('sender_address',  $delivery->sender_address);
        $delivery->add_info = $request->get('add_info',  $delivery->add_info);
        $delivery->save();
         return "Delivery " .  $delivery->id . " has been updated";

    }

    






}
