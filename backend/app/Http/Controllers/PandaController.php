<?php

namespace App\Http\Controllers;

use App\Http\Resources\PandaResource;
use App\Models\Panda;
use Illuminate\Http\Request;

class PandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Panda::query(); 
        $orderBy = $request->query('orderBy', 'name');
        $order = $request->query('order', 'asc');
        if ($orderBy == 'consumption_DESC') {
            $query->orderBy('consumption','asc')->get();
        }
        if (!in_array($order, ['asc', 'desc'])) {
            return response()->json(['error' => 'Invalid order parameter.'], 400);
        }
        if ($orderBy === 'age') {
            $query->whereNotNull('birth')
                ->orderByRaw('DATEDIFF(CURRENT_DATE, birth) ' . ($order === 'asc' ? 'ASC' : 'DESC'));
        } else {
            $query->orderBy($orderBy, $order);
        }
    
        
        return PandaResource::collection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'sex' => 'required|in:M,F', 
            'birth' => 'nullable|date',
        ]);

        $panda = Panda::create($request->all());
        return new PandaResource($panda);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $panda = Panda::findOrFail($id);
        return new PandaResource($panda);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $query = Panda::findOrFail($id);
        $query->update($request->all());
        return new PandaResource($query);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = Panda::findOrFail($id);
        $query->delete();
        return new PandaResource($query);
    }
}
