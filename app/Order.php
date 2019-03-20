<?php

namespace App;

use SimpleXMLElement;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $hasAddress;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable('orders');
        $this->hasAddress = true;
    }

    /**
     * Returns the address from selected order.
     *
     * @return void
     */
    public function getAddress(int $id)
    {
        return Address::whereId($id)->select('id', 'name', 'address', 'city', 'country')->first();    
    }

    /**
     * Returns the person data from selected order.
     *
     * @return void
     */
    public function getPerson(int $id)
    {
        return Person::whereId($id)->select('id', 'name')->first();    
    }

    /**
     * Returns all items from selected order.
     *
     * @return void
     */
    public function items()
    {
        return $this->hasMany( 'App\OrderItem', 'order_id' );    
    }

    /**
     * Create a new order and returns the ID.
     *
     * @param SimpleXMLElement $data
     * @return integer
     */
    public function saveOrder(SimpleXMLElement $data)
    {
        if (is_object( $data->items ) and count( $data->items ) == 0) {
            return false;
        }        

        // Let's save the address, get its ID and store it with this Order 
        if (is_object( $data->shipto ) and count( $data->shipto ) > 0) {

            $address = new Address();
            $address->name = $data->shipto->name;
            $address->address = $data->shipto->address;
            $address->city = $data->shipto->city;
            $address->country = $data->shipto->country;
            $address->save();

        } else {

            $this->hasAddress = false;

        }

        if ($this->hasAddress) {
            $this->address_id = $address->id;
        }
        $this->person_id = $data->orderperson;
        $this->save();

        // Order's ID
        $id = $this->id;

        // Items
        foreach ($data->items->item as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $id;
            $orderItem->title = $item->title;
            $orderItem->note = $item->note;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $item->price;
            $orderItem->save();
        }
        
        return true;
    }
}
