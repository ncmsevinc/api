<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($each){
                $each['link'] = route('products.show', $each['id']);
                $each['rating'] = $each->reviews->count() > 0 ? round($each->reviews->sum('star')/$each->reviews->count(),2) : 'Puanlama yoktur!';
                unset($each->reviews);
                unset($each['created_at']);
                unset($each['updated_at']);
                return $each;
            })
        ];
    }
}
