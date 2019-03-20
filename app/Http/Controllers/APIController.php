<?php

namespace App\Http\Controllers;

use App\Order;
use App\Person;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function orders(Order $order)
    {
        $response = [];
        $orders = $order::all();
        
        if (is_object( $orders ) and count( $orders ) > 0) {
            foreach ($orders as $order) {
                
                $data = [
                    'order_id' => $order->id,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->updated_at
                ];

                $address = $order->getAddress($order->address_id);
                $person = $order->getPerson($order->person_id);

                $items = $order->items;

                if (is_object( $address ) and $address !== null) {
                    $data['address'] = [
                        'id' => $address->id,
                        'name' => $address->name
                    ];
                }

                if (is_object( $person ) and $person !== null) {
                    $data['person'] = [
                        'id' => $person->id,
                        'name' => $person->name
                    ];
                }
                
                if (is_object( $items ) and count( $items ) > 0) {
                    $data['items'] = [];
                    foreach ($items as $item) {
                        array_push( $data['items'], [
                            'id' => $item->id,
                            'title' => $item->title,
                            'note' => $item->note,
                            'quantity' => $item->quantity,
                            'price' => $item->price
                        ] );
                    }
                }

                array_push( $response, $data );
            }
        }

        return response()->json($response, 201);
    }

    public function people(Person $person)
    {
        $response = [];
        $people = $person::all();
        
        if (is_object( $people ) and count( $people ) > 0) {
            foreach ($people as $person) {
                
                $data = [
                    'id' => $person->id,
                    'name' => $person->name,
                    'created_at' => $person->created_at,
                    'updated_at' => $person->updated_at
                ];

                $phones = $person->phones;

                if (is_object( $phones ) and count( $phones ) > 0) {
                    $data['phones'] = [];
                    foreach ($phones as $phone) {
                        array_push( $data['phones'], [
                            'id' => $phone->id,
                            'phone' => $phone->number
                        ] );
                    }
                }

                array_push( $response, $data );
            }
        }

        return response()->json($response, 201);
    }
}
