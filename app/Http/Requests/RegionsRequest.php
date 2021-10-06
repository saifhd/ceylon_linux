<?php

namespace App\Http\Requests;

use App\Models\Region;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegionsRequest extends FormRequest
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
        $zone=request()->zone;
        $name=request()->name;
        return [
            'zone' =>'required',
            'name'=>Rule::unique('regions')
                    ->where(function ($query) use ($zone, $name) {
                        return $query->where('name', $name)
                        ->where('zone_id', $zone);
                    }),
            'code'=>'required|unique:regions'
        ];
    }

    
}
