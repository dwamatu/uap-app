<?php


namespace App\Http\Requests;



class TypeOfLossRequest extends Request
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
            'loss_name' => 'required|max:40',
            'loss_description' => 'required',
            'deleted'=>'required',
            'creation_date'=>'required',
        ], route('uap.type.loss.store') );

        return $rules;

    }
}
