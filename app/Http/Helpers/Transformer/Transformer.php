<?php

namespace App\Http\Helpers\Transformer;

abstract class Transformer {

    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}
