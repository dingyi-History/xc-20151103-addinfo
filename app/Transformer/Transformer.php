<?php
namespace APP\Transformer;

abstract class Transformer
{
    public function transformConllection($items)
    {
        return array_map([$this,'transform'],$items);
    }

    public abstract function transform($item);
}