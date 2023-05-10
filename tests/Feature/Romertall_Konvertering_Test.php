<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Romertall_Konvertering_Test extends TestCase {

  
    public function test_romanNumeral_to_integer_conversion_api_with_valid_input() {

        $response = $this->get('http://localhost:8000/api/v1/romertall?parma=XXV');

        $response->assertStatus(200);
        $response->assertJson([
            'input' => 'XXV',
            'result' => 25,
        ]);
    }


    public function test_romanNumeral_to_integer_conversion_api_with_invalid_input() {
       
        $response = $this->get('http://localhost:8000/api/v1/romertall?parma=ABCD');

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The given data was invalid.',
            'errors' => [
                'roman_numeral' => ['The roman numeral field is invalid.'],
            ],
        ]);
    }
}






