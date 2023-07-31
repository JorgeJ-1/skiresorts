<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkiResortUpdateRequest extends SkiResortRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->skiResort);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id=$this->skiResort->id;
        
        return [
            //
            'name' => "required|max:256|unique:skiresorts,name,$id", 
        ]+parent::rules();
    }
}
