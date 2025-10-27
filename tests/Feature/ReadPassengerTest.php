<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ReadPassengerTest extends TestCase
{
    /**
     * Display a list of passengers.
     */
    public function test_can_display_list_of_passengers(): void
    {
        // Arrange
        $eventData = [
            'first_name' => 'Alain test',
            'last_name' => 'Jean Test',
            'email' => 'alain@email.com',
            'password' => '2025/11/04',
            'avatar' => UploadedFile::fake()->image('avatar.jpg'),
            'dob' => 'Test read location 1'
        ];

        // Act
        $response = $this->getJson('/api/passengers', $eventData); dd($response->json());

        // Assert
        $response->assertStatus(200);
    }
}
