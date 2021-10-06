<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRegionsRequest extends FormRequest
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
        $name = request()->name;
        $zone = request()->zone;
        return [
            'zone'=>'required',
            'name' => [
                'required',
                Rule::unique('regions')->ignore($this->region)
                    ->where(function ($query) use ($name, $zone) {
                        return $query->where('name', $name)
                        ->where('zone_id', $zone);
                    }),

            ],
        ];
    }
}
