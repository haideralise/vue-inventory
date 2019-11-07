<?php

namespace App\Http\Requests\Ingredient;

use App\Ingredient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddRequest extends FormRequest
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
        return [
            'name' => ['required', Rule::unique('ingredients', 'name')
                ->where('vendor_id', $this->vendor()->id )
            ],
            'unit' => 'required|in:'. implode(',', Ingredient::AvailableUnits()),
            'price' => 'required|min:1'
        ];
    }
    public function vendor()
    {
        return $this->route()->parameter('vendor');
    }
}
