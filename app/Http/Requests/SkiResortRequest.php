<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkiResortRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // provisionalmente hasta que tengamos montadas las policies
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
            //
            'name' => 'required|max:256|unique:skiresorts', 
            'town' => 'required|max:256',
            'country' => 'required|max:256',
            'lifts' => 'required|numeric|between:1,999',
            'slopeKms' => 'required|numeric|between:1,99999',
            'runs' => 'required|numeric|between:1,99999',
            'isOpen'=> 'required_with:openRuns|numeric|between:0,1',
            'openRuns' => 'required_if:isOpen,1|numeric|between:0,99999',
            //'seasonStart' => 'required_if:isOpen',
            //'seasonEnd' => 'required_if:isOpen',
        ];
    }
}
