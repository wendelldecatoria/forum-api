<?php

namespace App\Http\Helpers\Transformer;

use App\Http\Helpers\Transformer\Transformer;
use Carbon\Carbon;

class MessageTransformer extends Transformer {

    public function transform($message)
    {
        return [
            'id'            => $message['id'],
            'body'          => $message['body'],
            'highlight'     => (boolean) $message['is_highlight'],
            'created_at'    => Carbon::createFromFormat('Y-m-d H:i:s', $message['created_at'], 'UTC'),
            'updated_at'    => Carbon::createFromFormat('Y-m-d H:i:s', $message['updated_at'], 'UTC'),
        ];
    }
}
