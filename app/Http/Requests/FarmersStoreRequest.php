<?php


namespace App\Http\Requests;



class FarmersStoreRequest extends Request
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
            'account_number' => 'required',
            'season_id' => 'required',
            'id_number'=>'required',
            'farmer_name'=>'required',
            'cell_group'=>'required',
            'cell_leader'=>'required',
            'farmer_zone'=>'required',
            'area_staff'=>'required',
            'alm_manager'=>'required',
            'category'=>'required',
            'target'=>'required',
            'target_planted_land'=>'required',
            'plant_count'=>'required',
            'planted_land'=>'required',
            'ltay'=>'required',
            'expected_kg'=>'required',
            'user_status_id'=>'required',
            'deleted'=>'required',
            'creation_date'=>'required',
        ], route('uap.farmers.store') );

        return $rules;

    }
}
