<?php

namespace Tests\Feature;

use App\Models\Song;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Features;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class SongControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    public function test_songs_list_can_be_accessed()
    {
        $song = Song::factory()->create();

        $response = $this->get('/api/songs');
        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'title' => $song->title,
                    ]
                ]
            ]);
    }

    public function test_songs_can_be_created()
    {
        $payload = [
            'title' => $this->faker->sentence(),
            'url' => $this->faker->imageUrl(55, 55, 'animals'),
            'artist_name' => $this->faker->name(),
            'duration' => $this->faker->numberBetween(60, 240)
        ];

        $response = $this->post('/api/songs', $payload);
        $response
            ->assertJson([
                'created' => true,
            ]);

        $this->assertDatabaseHas('songs', [
            'title' => $payload['title'],
            'url' => $payload['url'],
            'artist_name' => $payload['artist_name']
        ]);
    }

    public function test_songs_can_be_updated()
    {
        $song = Song::factory()->create();

        $payload = [
            'title' => $this->faker->sentence()
        ];

        $response = $this->put('/api/songs/' . $song->id, $payload);
        $response
            ->assertJson([
                'updated' => true,
            ]);

        $this->assertDatabaseHas('songs', [
            'title' => $payload['title'],
            'url' => $song->url,
            'artist_name' => $song->artist_name
        ]);
    }

    public function test_songs_can_be_deleted()
    {
        $song = Song::factory()->create();

        $response = $this->delete('/api/songs/' . $song->id);
        $response
            ->assertJson([
                'deleted' => true,
            ]);

        $this->assertDatabaseMissing('songs', [
            'id' => $song->id
        ]);
    }
}
