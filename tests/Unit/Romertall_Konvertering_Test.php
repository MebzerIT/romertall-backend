<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Api\V1\RomertallController;

class RomerTall_Konvertering_Test extends TestCase
{
    public function test_romanNumeral_to_integer_conversion_with_valid_input()
    {
        $response = $this->get('http://localhost:8000/api/v1/romertall', ['parma' => 'XLII']);

        $response->assertOk();
        $response->assertJson(['result' => 42]);
    } 

    public function test_romanNumeral_to_integer_conversion_with_invalid_input()
    {
        $input = 'ABCD';

        $this->expectException(\InvalidArgumentException::class);

        $this->get('http://localhost:8000/api/v1/romertall', ['parma' => $input]);
    }
}