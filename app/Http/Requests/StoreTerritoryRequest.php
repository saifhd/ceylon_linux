<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTerritoryRequest extends FormRequest
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
            'region'=>'required',
            'zone'=>'required',
            'name' => Rule::unique('territories')
                ->where(function ($query) use ($region, $name) {
                    return $query->where('name', $name)
                    ->where('region_id', $region);
                }),
            'code'=>'required|unique:territories'
        ];
    }
}
