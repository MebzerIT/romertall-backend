<?php
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Konverteringer;
use App\Http\Resources\KonverteringerCollection;

class Konvertering_Historikk_Api_Test extends TestCase
{
    use RefreshDatabase;

    public function test_convertion_history_api_returns_convertions()
    {
        // Create some Konverteringer instances in the database
        $konverteringer = Konverteringer::factory()->count(3)->create();

        // Make a GET request to the historikk API endpoint
        $response = $this->get('http://localhost:8000/api/v1/konverteringer/historikk');

        // Assert that the response has a 200 status code
        $response->assertStatus(200);

        // Assert that the response data matches the expected format
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    "id",
                    'romertall',
                    'integertall',
                    'opprettetKl',
                ]
            ]
        ]);

        // Assert that the response data contains the expected Konverteringer instances
        $response->assertJson([
            'data' => (new KonverteringerCollection($konverteringer))->toArray(null)
        ]);
    }
}