<?php

namespace App\Http\Requests;



class SeasonsStoreRequest extends Request
{

    /**
     *
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        $rules = array_merge([
            'start_date' => 'required',
            'end_date' => 'required',
            'deleted'=>'required',
            'creation_date'=>'required',
        ], route('uap.seasons.store') );

        return $rules;

    }
}
