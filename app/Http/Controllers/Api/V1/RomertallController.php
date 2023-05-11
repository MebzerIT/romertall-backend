<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\konverteringer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRomertallRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class RomertallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  
        $request->validate([
            'parma' => 'required|regex:/^[IVXLCDM]+$/',
        ]);
        
        $roman = $request->input('parma');

        //check if the value is on cache
        $integer = Cache::get($roman);

         //If not in cache, check in DB
        if ($integer === null) {
            $konvertering = Konverteringer::where('romertall', $roman)->first();
            
            //If not in DB, convert and store it to DB
            if ($konvertering === null) {
                $integer = $this->romanToInt($roman);
                $konvertering = Konverteringer::create(['romertall' => $roman, 'integertall' => $integer]);
            } else {
                $integer = $konvertering->integertall;
            }
            // Cache the result for 1 hour
            Cache::put($roman, $integer, 60 * 60); 
          }
        
        return response()->json(['integertall' => $integer]);        
    }

    private function romanToInt($roman)
    {
        $values = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
        ];

        $total = 0;
        $previousValue = 0;

        for ($i = strlen($roman) - 1; $i >= 0; $i--) {
            $currentValue = $values[$roman[$i]];

            if ($currentValue < $previousValue) {
                $total -= $currentValue;
            } else {
                $total += $currentValue;
            }

            $previousValue = $currentValue;
        }

        return $total;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRomertallRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Romertall $romertall)
    {
        return new RomertallResource($romertall);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Romertall $romertall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRomertallRequest $request, Romertall $romertall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Romertall $romertall)
    {
        //
    }
}
