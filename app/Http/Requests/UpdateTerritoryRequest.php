<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTerritoryRequest extends FormRequest
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
        $region=request()->region;
        $name=request()->name;
        return [
            'zone'=>'required',
            'region'=>'required',
            'name' => [
                'required',
                Rule::unique('territories')->ignore($this->territory)
                    ->where(function ($query) use ($name, $region) {
                        return $query->where('name', $name)
                        ->where('region_id', $region);
                    }),
            ]

        ];
    }
}
