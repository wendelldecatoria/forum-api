<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Transformer\MessageTransformer;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    /**
     * @var App\Http\Helpers\Transformer\MessageTransformer
     */
    protected $messageTransformer;

    public function __construct(MessageTransformer $messageTransformer)
    {
        $this->messageTransformer = $messageTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index()
    {
        return $this->messageTransformer->transformCollection(Message::all()->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @return Message
     */
    public function show(Message $message)
    {
        return $this->messageTransformer->transform($message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @todo Only return fields appropriate to profile
     * @param  \Illuminate\Http\Request $request
     * @return Message
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'topic_id' => 'required',
            'body' => 'required',
        ]);

        return Message::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @todo Only the owning user or a moderator should be able to update this resource.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Message      $message
     * @return Message
     */
    public function update(Request $request, Message $message)
    {
        $message->update($request->all());

        return $message->fresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message $message
     * @throws \Exception
     */
    public function destroy(Message $message)
    {
        $message->delete();
    }
}
