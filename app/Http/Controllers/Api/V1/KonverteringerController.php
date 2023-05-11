<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\konverteringer;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatekonverteringerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\KonverteringerResource;
use App\Http\Resources\V1\KonverteringerCollection;
use App\Http\Requests\V1\StoreKonverteringerRequest;
use App\Http\Controllers\Api\V1\KonverteringerController;

class KonverteringerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new KonverteringerCollection(Konverteringer::all());
    }
    
    public function historikk(Request $request)
    {   
        // Default items per page 
        $perPage = $request->input('per_page', 7); 
        $konverteringer = new KonverteringerCollection(Konverteringer::orderBy('created_at', 'desc')->paginate($perPage));
    
        return response()->json($konverteringer);
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
    public function store(StorekonverteringerRequest $request)
    {
        return new KonverteringerResource(Konverteringer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(konverteringer $konverteringer)
    {
        return new KonverteringerResource($konverteringer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(konverteringer $konverteringer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekonverteringerRequest $request, konverteringer $konverteringer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(konverteringer $konverteringer)
    {
        //
    }
}
