<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conversations = Conversation::all();
        return ConversationResource::collection($conversations);
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
    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $conversation = Conversation::create($data);

    return new ConversationResource($conversation);
}
    /**
     * Display the specified resource.
     */
    public function show(Conversation $conversation)
    {
        return new ConversationResource($conversation);
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
    public function update(Request $request, Conversation $conversation)
{
    $data = $request->validate([
        'title' => 'sometimes|string|max:255',
    ]);

    $conversation->update($data);

    return new ConversationResource($conversation);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conversation $conversation)
    {
        $conversation->delete();
        return response()->json(['message' => 'Conversation deleted successfully'], 200);
    }

}