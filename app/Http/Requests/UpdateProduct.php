<?php

namespace App\Http\Requests;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
{
    public function prepareForValidation()
    {
        $now = Carbon::now()->toDayDateTimeString();
        $this->merge([
            'updated_at' => $now,
        ]);
    }

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
        $rules = Product::$rules;

        return $rules;
    }
}
