<?php


namespace App\Http\Requests;



class CauseOfLossRequest extends Request
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
            'description' => 'required',
            'deleted'=>'required',
            'creation_date'=>'required',
        ], route('uap.cause.loss.store') );

        return $rules;

    }
}
