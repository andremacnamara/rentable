<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->visit('/register')
        ->type('Andre MacNamara', 'name')
        ->type('AndreMacNamara@test.com', 'email')
        ->type('password', 'password')
        ->press('Register')
        ->seePageIs('/register');
    }
}
