<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Api\V1\RomertallController;

class RomerTall_Konvertering_Test extends TestCase
{
    protected $converter;
    protected $actualOutput;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->converter = new RomertallController();
    }
    
    public function test_romanNumeral_to_integer_conversion_with_valid_input(){

        $input = 'XLII';
        $expectedOutput = 42;

        $this->actualOutput = $this->converter->index(new Illuminate\Http\Request(['parma' => $input]));

        $this->assertEquals($expectedOutput, $this->actualOutput);
    }

   public function test__romanNumeral_to_integer_conversion_with_invalid_input(){
        $input = 'ABCD';

        $this->expectException(\InvalidArgumentException::class);

        $this->converter->index(new Illuminate\Http\Request(['parma' => $input]));
   }
}