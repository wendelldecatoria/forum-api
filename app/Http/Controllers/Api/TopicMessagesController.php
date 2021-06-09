<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Transformer\MessageTransformer;
use App\Models\Message;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class TopicMessagesController extends Controller
{
    /**
     * @var App\Http\Helpers\Transformer\MessageTransformer
     */
    protected $messageTransformer;

    public function __construct(MessageTransformer $messageTransformer)
    {
        $this->messageTransformer = $messageTransformer;
    }

    public function show(Topic $topic, Request $request) {
        $acceptedSort = ['body', 'created_at'];

        $sort = $request->sort ?? null;

        if(!in_array($sort, $acceptedSort)) {
            $sort = 'created_at';
            // TODO: set error handling and proper error response
        }

        $messages = $topic->messages()
                        ->orderBy($sort, 'asc')
                        ->get()
                        ->toArray();
        return $this->messageTransformer->transformCollection($messages);
    }
}
