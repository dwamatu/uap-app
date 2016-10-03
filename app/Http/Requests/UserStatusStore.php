<?php


namespace App\Http\Requests;



class UserStatusStore extends Request
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
            'status_name' => 'required|max:40',
            'staus_description' => 'required',
            'deleted'=>'required',
            'creation_date'=>'required',
        ], route('uap.users.statuses.store') );

        return $rules;

    }
}
