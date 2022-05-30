<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginFormDisplayed extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_form_is_displayed()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }
}
