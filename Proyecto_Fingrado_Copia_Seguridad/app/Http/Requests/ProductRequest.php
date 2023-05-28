<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /**
         * Verificar que el usuario que crea el producto es el loguedado
         */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $product = $this->route()->parameter('product');
        // If it is not published only save this data
        $rules = [ 
            'name' => 'required',
            'slug' => 'required|unique:products',
            'status' => 'required|in:1,2',
            'trending' => 'required|in:1,2',
            'file' => 'image'
        ];

        if($product){
            $rules['slug'] = 'required|unique:products,slug,' . $product->id;
        }

        // If the status is published it saves all this data
        if($this->status == 2 ){
            $rules = array_merge($rules, [

                'category_id' => 'required',
                'tags' => 'required',
                'description' => 'required',
                'price' => 'required',
                'brand' => 'required',
                'qty' => 'required',
                'file1' => 'required',
                'file2' => 'required'
            ]);
        }

        return $rules;
    }
}
