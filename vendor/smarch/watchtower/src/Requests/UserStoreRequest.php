<?php

namespace Smarch\Watchtower\Requests;

use App\Http\Requests\Request;

use Carbon\Carbon;

class UserStoreRequest extends Request
{

    public function all() {
        $atts = parent::all();
        
        if ($atts['Password'] === $atts['Password_confirmation']) {
            $crypted = bcrypt( $atts['Password'] );
            $atts['Password'] = $crypted;
            $atts['Password_confirmation'] = $crypted;
        }
        
        return $atts;
    }

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
  
       $rules = array_merge([
            'Firstname' => 'required|max:40',
            'Lastname' => 'required|max:40',
            'Email' => 'required|email|unique:users',
            'Password' => 'required|confirmed|min:4',
            'Deleted'=>'0',
            'IDRoles'=>'27',
            'CreationDate'=>Carbon::now(),
        ], config('watchtower.user.rules.store') );

       return $rules;
       
    }
}
