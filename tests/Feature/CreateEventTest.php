<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CreateEventTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_an_event_can_be_created(): void
    {
        // Arrange
        $eventData = [
            'name' => 'Test name',
            'description' => 'Test description',
            'image' => UploadedFile::fake()->image('test-image.jpg'),
            'date' => '2025/11/04',
            'time' => '08:00:00',
            'location' => 'Test location'
        ];


        // Act
        $response = $this->postJson('/api/events', $eventData);

        // Assert status 201
        $response->assertStatus(201);

        $this->assertDatabaseHas('events', $eventData);
    }
}
