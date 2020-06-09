<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this);

        //$id = $this->segment(2);
        $id = $this->id;
        
        return [
            'name' => "required|min:3|max:80|unique:products,name,{$id},id",
            "description" => 'required|min:3|max:90',
            'price' => 'nullable',
            'image' => 'nullable|image',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'Ops! nome está mmuito curto',
        ];
    }
}
