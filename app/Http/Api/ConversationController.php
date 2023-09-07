<?php

namespace App\Http\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConversationResource;
use App\Models\Conversation;
use App\Http\Requests\ConversationRequest;


class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conversations = Conversation::all();
        return response()->json(['conversations' => $conversations], 200);
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
    public function store(ConversationRequest $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $conversation = Conversation::create($data);

    return response()->json(['conversation' => $conversation], 201);
}
    /**
     * Display the specified resource.
     */
    public function show(Conversation $conversation)
    {
        return response()->json(['conversation' => $conversation], 200);
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

    public function getParticipants($conversation_id)
    {
        // Fetch the conversation
        $conversation = Conversation::find($conversation_id);

        if (!$conversation) {
            return response()->json(['message' => 'Conversation not found'], 404);
        }

        // Fetch the participants (users) for this conversation
        $participants = $conversation->participants->toArray();

        return response()->json($participants);
    }

    public function userConversations($user_id)
    {
        // Get the user by ID
        $user = User::find($user_id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Get conversations of the user
        $conversations = $user->conversations;

        return response()->json($conversations);
    }
}
