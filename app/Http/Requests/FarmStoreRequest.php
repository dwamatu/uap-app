<?php


namespace App\Http\Requests;



class FarmRequest extends Request
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
            'farm_name' => 'required|max:40',
            'size_with_tobacco' => 'required',
            'planting_date' => 'required',
            'farmer_id' => 'required',
            'season_id'=>'required',
            'deleted'=>'required',
            'creation_date'=>'required',
        ], route('uap.farms.store') );

        return $rules;

    }
}
