<?php

namespace App\Http\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ParticipantRequest;
use App\Http\Resources\ParticipantResource;
use App\Models\Participant;


class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participant::all();

        return response()->json(['participants' => $participants], 200);    
    }

    // public function index($userId)
    // {
    //     $participants = Participant::where('user_id', $userId)->get();

    //     return response()->json(['coversations'=> $conversations], 200);    
    // }
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
    public function store(ParticipantRequest $request)
    {
        $data = $request->validated();
        $participant = Participant::create($data);
    
        return response()->json(['message' => 'Participant added successfully', 'participant' => $participant], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $participant = Participant::findOrFail($id);

        return response()->json(['participant' => $participant], 200);  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ParticipantRequest $request, $id)
    {
        $participant = Participant::findOrFail($id);
        $participant->update($request->validated());

        return new ParticipantResource($participant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        return response()->json(['message' => 'Participant removed successfully']);
    }
}
