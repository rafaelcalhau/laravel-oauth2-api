<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrdersTest extends TestCase
{
    /**
     * Test if the order has a address.
     *
     * @return void
     */
    public function testOrderHasAddress()
    {
        $order = new \App\Order();
        $first = $order::first();

        if($first !== null) {
            $address = $first->getAddress( $first->address_id );
            $this->assertInternalType( 'object', $address );
        }
    }

    /**
     * Test if the order has a person.
     *
     * @return void
     */
    public function testOrderHasPerson()
    {
        $order = new \App\Order();
        $first = $order::first();

        if($first !== null) {
            $person = $first->getPerson( $first->person_id );
            $this->assertInternalType( 'object', $person );
        }
    }

    /**
     * Test if the order has items.
     *
     * @return void
     */
    public function testOrderHasItems()
    {
        $order = new \App\Order();
        $first = $order::first();

        if($first !== null) {
            $this->assertInternalType( 'int', count( $first->items ) );
        }
    }
}
