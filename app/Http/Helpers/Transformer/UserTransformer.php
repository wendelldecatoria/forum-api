<?php

namespace App\Http\Helpers\Transformer;

use App\Http\Helpers\Transformer\Transformer;
use Carbon\Carbon;

class UserTransformer extends Transformer {

    public function transform($user)
    {
        return [
            'id'            => $user['id'],
            'name'          => $user['name'],
            'email'         => $user['email'],
            'nickname'      => $user['nickname'],
            'bio'           => $user['bio'],
            'created_at'    => Carbon::createFromFormat('Y-m-d H:i:s', $user['created_at'], 'UTC'),
            'updated_at'    => Carbon::createFromFormat('Y-m-d H:i:s', $user['updated_at'], 'UTC'),
        ];
    }
}
