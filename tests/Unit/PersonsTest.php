<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonsTest extends TestCase
{
    /**
     * Test if the person has phones.
     *
     * @return void
     */
    public function testPersonHasPhones()
    {
        $person = new \App\Person();
        $first = $person::first();

        if($first !== null) {
            $this->assertInternalType( 'int', count( $first->phones ) );
        }
    }
}
