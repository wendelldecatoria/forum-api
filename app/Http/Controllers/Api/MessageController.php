<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Transformer\MessageTransformer;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


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
    public function index(Request $request)
    {
        $limit = $request->limit ?? 10;
        $items = $this->messageTransformer->transformCollection(Message::all()->toArray());
        return $this->paginate($items, $limit);
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
            'parent_id' => 'required',
            'topic_id' => 'required',
            'body' => 'required',
        ]);

        // get topic id for a give parent id
        $message = Message::where('id', $request->parent_id)->first();

        if($message->topic_id != $request->topic_id) {
            return response()->json([
                'error' => [
                    'message' => "Cannot link a message to a parent_id that doesn't share the same topic_id",
                ]
            ]);
        }

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

    private function paginate($items, $perPage = 10) {
        // TODO: need to move this to its own Pagination helper class

        $page = Paginator::resolveCurrentPage('page') ?: 1;
        $startIndex = ($page - 1) * $perPage;
        $total = count($items);
        $results = array_slice($items, $startIndex, $perPage);

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
    }
}
