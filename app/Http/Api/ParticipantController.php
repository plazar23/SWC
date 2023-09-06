<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($conversationId)
    {
        $participants = Participant::where('conversation_id', $conversationId)->get();

        return ParticipantResource::collection($participants);
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

        return new ParticipantResource($participant);
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
