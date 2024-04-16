<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id=  $info = Info::findOrFail(request()->input('_id'));
        $infos = Info::find($id);
        return response()->json($infos);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'linkden' => 'required',
            'github' => 'required',
            'description' => 'required',

        ]);

        if(!empty($request->input('_id'))){
            $info = Info::findOrFail($request->input('_id'));

            $info->first_name = $request->input('first_name');
            $info->last_name = $request->input('last_name');
            $info->email = $request->input('email');
            $info->phone = $request->input('phone');
            $info->address = $request->input('address');
            $info->state = $request->input('state');
            $info->linkden = $request->input('linkden');
            $info->github = $request->input('github');
            $info->description = $request->input('description');


            $info->save();

            return response()->json(['message' => 'Info updated successfully']);
        }else{
            $info = new Info();
            $info->first_name = $request->input('first_name');
            $info->last_name = $request->input('last_name');
            $info->email = $request->input('email');
            $info->phone = $request->input('phone');
            $info->address = $request->input('address');
            $info->state = $request->input('state');
            $info->linkden = $request->input('linkden');
            $info->github = $request->input('github');
            $info->description = $request->input('description');

            $info->save();
            return response()->json(['message' => 'Infos created successfully']);
        }



    }


}
