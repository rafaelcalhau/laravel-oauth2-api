<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelsTest extends TestCase
{
    /**
     * Testing the AccessToken model.
     *
     * @return void
     */
    public function testAccessToken()
    {
        $model = new \App\AccessToken();
        $counter = count($model::all());
        
        $this->assertInternalType( 'int', $counter );
    }

    /**
     * Testing the Address model.
     *
     * @return void
     */
    public function testAddress()
    {
        $model = new \App\Address();
        $counter = count($model::all());
        
        $this->assertInternalType( 'int', $counter );
    }

    /**
     * Testing the Client model.
     *
     * @return void
     */
    public function testClient()
    {
        $model = new \App\Client();
        $counter = count($model::all());
        
        $this->assertInternalType( 'int', $counter );
    }

    /**
     * Testing the Order model.
     *
     * @return void
     */
    public function testOrder()
    {
        $model = new \App\Order();
        $counter = count($model::all());
        
        $this->assertInternalType( 'int', $counter );
    }

    /**
     * Testing the OrderItem model.
     *
     * @return void
     */
    public function testOrderItem()
    {
        $model = new \App\OrderItem();
        $counter = count($model::all());
        
        $this->assertInternalType( 'int', $counter );
    }

    /**
     * Testing the Person model.
     *
     * @return void
     */
    public function testPerson()
    {
        $model = new \App\Person();
        $counter = count($model::all());
        
        $this->assertInternalType( 'int', $counter );
    }

    /**
     * Testing the Phone model.
     *
     * @return void
     */
    public function testPhone()
    {
        $model = new \App\Phone();
        $counter = count($model::all());
        
        $this->assertInternalType( 'int', $counter );
    }

    /**
     * Testing the User model.
     *
     * @return void
     */
    public function testUser()
    {
        $model = new \App\User();
        $counter = count($model::all());
        
        $this->assertInternalType( 'int', $counter );
    }
}
