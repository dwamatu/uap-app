<?php

namespace Smarch\Watchtower\Requests;

use App\Http\Requests\Request;

use Carbon\Carbon;

class UserStoreRequest extends Request
{

    public function all() {
        $atts = parent::all();
        
        if ($atts['password'] === $atts['password_confirmation']) {
            $crypted = bcrypt( $atts['password'] );
            $atts['password'] = $crypted;
            $atts['password_confirmation'] = $crypted;
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
            'first_name' => 'required|max:40',
            'last_name' => 'required|max:40',
            'username' => 'required|max:40',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4',
            'deleted'=> 'f',
            'role_id'=>'required',
            'creation_date'=>Carbon::now(),
        ], config('watchtower.user.rules.store') );

       return $rules;
       
    }
}
