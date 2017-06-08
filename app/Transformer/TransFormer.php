<?php
namespace App\Transformer;


/**
 * Class TransFormer
 * @package App\Transformer
 */
abstract class TransFormer
{
    /**
     * @param $items
     * @return array
     * @author yuerengui
     * @description
     */
    public function transformCollection($items)
    {
        return array_map([$this,'transform'],$items);
    }

    /**
     * @param $item
     */
    public function transform($item){}
}