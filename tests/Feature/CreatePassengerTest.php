<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CreatePassengerTest extends TestCase
{
    /**
     * Tests that a passenger can be created.
     */
    public function test_a_passenger_can_be_created(): void
    {
        // Arrange
        $passenger = [
            'first_name' => 'Alain',
            'last_name'  => 'Jean',
            'email'      => 'testuser@email.com',
            'password'   => '1234',
            'avatar'     => UploadedFile::fake()->image('avatar.jpg'),
            'dob'        => '1990/02/17'
        ];

        // Act
        $response = $this->postJson('/api/passengers', $passenger); dd($response->json());

        // Assert status 201
        $response->assertStatus(201);

        // Assert DB insertion
        $this->assertDatabaseHas('passengers', $passenger);
    }
}
