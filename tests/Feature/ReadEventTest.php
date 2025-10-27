<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ReadEventTest extends TestCase
{
    /**
     * Display a list of events.
     */
    public function test_can_display_list_of_events(): void
    {
        // Arrange
        $eventData = [
            'name' => 'Test read event 1',
            'description' => 'Test read event description 1',
            'image' => UploadedFile::fake()->image('test-image.jpg'),
            'date' => '2025/11/04',
            'time' => '08:00:00',
            'location' => 'Test read location 1'
        ];

        // Act
        $response = $this->getJson('/api/events', $eventData);

        // Assert
        $response->assertStatus(200);
    }
}
