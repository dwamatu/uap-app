<?php

namespace Smarch\Watchtower\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
{

    public function all() {
        $atts = parent::all();
//
//        if ($atts['password'] === $atts['password_confirmation']) {
//            $crypted = bcrypt( $atts['password'] );
//            $atts['password'] = $crypted;
//            $atts['password_confirmation'] = $crypted;
//        }
        
        return $atts;
    }


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

       $rules = array_merge([
        'firstname' => 'required|max:40,'.$this->user,
        'secondname' => 'required|max:40,'.$this->user,
        'email' => 'required|email|unique:users,email,'.$this->user,
        'password' => 'confirmed|min:10|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
    ], config('watchtower.user.rules.update') );

        return $rules;

    }

}