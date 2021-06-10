<?php

namespace App\Http\Helpers\Transformer;

use App\Http\Helpers\Transformer\Transformer;
use Carbon\Carbon;
use Exception;
use Throwable;

class UserTransformer extends Transformer {

    public function transform($user)
    {
        $avatar = null;

        try {
            $avatar = $user->getFirstMediaUrl('avatars');
        } catch(Throwable $e) {
            // just an empty catch block to avoid error when no media relations are defined for the user
        }

        return [
            'id'            => $user['id'],
            'name'          => $user['name'],
            'email'         => $user['email'],
            'nickname'      => $user['nickname'],
            'bio'           => $user['bio'],
            'avatar'        => $avatar,
            'created_at'    => Carbon::createFromFormat('Y-m-d H:i:s', $user['created_at'], 'UTC'),
            'updated_at'    => Carbon::createFromFormat('Y-m-d H:i:s', $user['updated_at'], 'UTC'),
        ];
    }
}
