<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Info;
use App\Models\User;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $experiences = Experience::all(); // Access email property using ->email
        return response()->json($experiences);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'lieu' => 'required',
        ]);

        if(!empty($request->input('_id'))){
            $item = Experience::findOrFail($request->input('_id'));

            $item->name = $request->name;
            $item->description = $request->description;
            $item->start_date = $request->start_date;
            $item->end_date = $request->end_date;
            $item->lieu = $request->lieu;
            $item->save();

            return response()->json(['message' => 'Experience updated successfully']);
        }else{
            $item = new Experience();
            $item->name = $request->name;
            $item->description = $request->description;
            $item->start_date = $request->start_date;
            $item->end_date = $request->end_date;
            $item->lieu = $request->lieu;
            $item->save();

            return response()->json(['message' => 'Experience created successfully']);
        }


    }

    public function destroy()
    {
        $item = Experience::findOrFail(request()->input('_id'));
        $item->delete();

        return response()->json(['message' => 'Experience deleted successfully']);
    }


}
