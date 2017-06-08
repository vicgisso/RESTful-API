<?php
namespace App\Transformer;


/**
 * Class LessonTransformer
 * @package App\Transformer
 */
class LessonTransformer extends TransFormer
{
    /**
     * @param $item
     * @return array
     * @author yuerengui
     * @description
     */
    public function transform($item){
        return [
            'title'=>$item['title'],
            'content'=>$item['body'],
            'is_free'=>(boolean)$item['free']
        ];
    }
}