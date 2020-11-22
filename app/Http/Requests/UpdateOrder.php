<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
{
    public function prepareForValidation()
    {
        $added_by = auth()->user()->id;
        if ($added_by != $this->user_id) {
            return response()->json(['error' => 'Cannot update order you have not added!']);
        }
        $this->merge(['user_id' => $added_by]);
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
        $rules = Order::$rules;

        return $rules;
    }
}
