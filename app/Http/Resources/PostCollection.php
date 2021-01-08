<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Post */
class PostCollection extends ResourceCollection
{
    //手动追加内容到JSON数据中
    public function with($request)
    {
        return [
            'meta' => [
                'DIY' => 'DIY',
                'tiny'=>['one'=>'one','two'=>'two','three'=>'three']
            ],
        ];
    }

    public static $wrap = 'posts';

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'post' => $this->collection,
            'custom' => [
                'self' => 'custom-value',
            ],
        ];
    }

}
