<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function cant_view_account_while_guest()
    {
        // When
        $response = $this->get('/account');

        // Then
        $response->assertStatus(302);
    }

    /**
     * @test
     *
     * @return void
     */
    public function view_account_while_authenticated()
    {
        // Given
        $user = factory(User::class)->create();

        // When
        $response = $this->actingAs($user)->get('/account');
        $response_data = $response->getOriginalContent()->getData();

        // Then
        $response->assertStatus(200);
        $this->assertArrayHasKey('name', $response_data);
        $this->assertArrayHasKey('email', $response_data);
    }
}
