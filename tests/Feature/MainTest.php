<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MainTest extends TestCase
{
    /**
     * Test visiting the homepage
     *
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test visiting the user's dashboard
     *
     * @return void
     */
    public function testUserDashboard()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('/home');

        $response->assertStatus(200);
    }

    /**
     * Test requesting user data from API
     *
     * @return void
     */
    public function testApiCheckUser()
    {
        $user = User::first();

        if ($user !== null) {

            Passport::actingAs( factory(User::class)->create() );

            $response = $this->json('GET', '/api/user', ['name' => $user->name]);
            $response->assertStatus(201);

        }
        
    }

    /**
     * Test requesting user data from API
     *
     * @return void
     */
    public function testApiCheckPerson()
    {
        $person = \App\Person::first();

        if ($person !== null) {

            Passport::actingAs( factory(User::class)->create() );

            $response = $this->json('GET', '/api/people', ['name' => $person->name]);
            $response->assertStatus(201);

        }
        
    }

    /**
     * Test requesting user data from API
     *
     * @return void
     */
    public function testApiCheckOrder()
    {
        $order = \App\Order::first();

        if ($order !== null) {

            Passport::actingAs( factory(User::class)->create() );

            $response = $this->json('GET', '/api/orders', ['name' => $order->name]);
            $response->assertStatus(201);

        }
        
    }
}
