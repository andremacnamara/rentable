<?php

namespace Tests\Feature;

use Tests\TestCase;
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
        ->type('AndreMacNamara@test.com', 'email')
        ->type('password', 'password')
        ->press('Login')
        ->seePageIs('/login');
    }
}
