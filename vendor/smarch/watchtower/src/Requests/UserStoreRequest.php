<?php

namespace Smarch\Watchtower\Requests;

use App\Http\Requests\Request;

use Carbon\Carbon;

class UserStoreRequest extends Request
{

    public function all() {
        $atts = parent::all();
        
//        if ($atts['password'] === $atts['password_confirmation']) {
//            $crypted = bcrypt( $atts['password'] );
//            $atts['password'] = $crypted;
//            $atts['password_confirmation'] = $crypted;
//        }
        
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
            'firstname' => 'required|max:40',
            'secondname' => 'required|max:40',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
            'password_updated_at' => 'required',
       ], config('watchtower.user.rules.store') );

       return $rules;
       
    }
}
