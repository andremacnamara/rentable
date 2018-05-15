<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\PropertyAdvert;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PropertyAdvertTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPropertyAdvert()
    {
        //https://laravel.com/docs/5.6/testing
        
        //Authenticates User id:1
        $this->be(User::find(1));

        $this->visit('/property/advertise/create')
        ->type('45 Red Arches Road', 'address')
        ->type('Dublin', 'county')
        ->type('House', 'type')
        ->type('1000', 'rent')
        ->type('11/05/2018', 'date')
        ->type('3', 'bedrooms')
        ->type('5', 'bathrooms')
        ->select('Yes', 'furnished')
        ->type('Test Description', 'description')
        ->press('Submit')
        ->seePageIs('/property/advertise/create');
    }
}
