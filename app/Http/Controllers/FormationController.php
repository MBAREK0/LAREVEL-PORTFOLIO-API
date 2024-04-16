<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos = Formation::all();
        return response()->json($infos);
    }


    public function store(Request $request)
{
    // Validation des données de la requête
    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'lieu' => 'required',
    ]);
    if(!empty($request->input('_id'))){
        $item = Formation::findOrFail($request->input('_id'));

        $item->name = $request->name;
        $item->description = $request->description;
        $item->start_date = $request->start_date;
        $item->end_date = $request->end_date;
        $item->lieu = $request->lieu;
        $item->save();

        return response()->json(['message' => 'Formation updated successfully']);

}else{
    $item = new Formation();
    $item->name = $validatedData['name'];
    $item->description = $validatedData['description'];
    $item->start_date = $validatedData['start_date'];
    $item->end_date = $validatedData['end_date'];
    $item->lieu = $validatedData['lieu'];
    $item->save();

    return response()->json(['message' => 'Formation created successfully']);
}




}
}
