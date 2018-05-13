<?php

namespace Tests\Feature;

use Tests\TestCase;
use Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->visit('/login')
             ->type('ross.king@gmail.com','email')
             ->type('password','password')
             ->press('Login')
             ->see(Auth::user()->name);
    }
}
