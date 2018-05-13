<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\TenantPreferance;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTenantPerference()
    {
        
        $this->be(User::find(1));

        $this->visit('/account/preferance/create')
        ->type('Dublin', 'county')
        ->type('House', 'type')
        ->type('1000', 'rent')
        ->type('2', 'bedrooms')
        ->type('4', 'bathrooms')
        ->press('sbmit');
    }
}
