<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\PropertyAdvert;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchTenantTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $this->be(User::find(1));

        $this->visit('/user/search')
        //Takes in property id.
        ->select('1', 'property_address')
        ->press('search');
    }
}
