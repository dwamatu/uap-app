<?php
/**
 * Created by PhpStorm.
 * User: black
 * Date: 29/11/2016
 * Time: 11:14
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Utilities\InspectorUtilities;

class InspectorController extends Controller
{
    public function viewInspectors(){
        return view('inspectors.list');
    }
    /*Fetch all Crop inspectors*/
    public function getCropInspectors()
    {
        return (collect(InspectorUtilities::getCropInspectors())->toJson());
    }
    public function viewInspectorDetails($id){
        $individualDetails = InspectorUtilities::getInspectorDetails($id);
        $pageData = collect([]);
        $pageData->put('title', 'Individual Inspector Details');
        $pageData->put('individualDetails', $individualDetails);

//        dd($pageData);
//echo $pageData;
        return view('inspectors.details', ['pageData' => $pageData->toArray()]);
    }


    public function editIndividualInspectorDetails($id)
    {
        session()->put('individualEditFlag', true);

        return back();
    }

    /**
     * Edit details of the individual with the specified ID.
     * @param  integer $id
     * @return View
     */
    public function cancelEditIndividualInspectorDetails($id)
    {
        session()->forget('individualEditFlag');

        return redirect()->route('inspectors');
    }
    /*Create New Inspector page*/
    public function createInspectors()
    {
        $pageData = collect([]);

        $pageData->put('title', 'Add Inspector');

        return view('inspectors.add', ['pageData' => $pageData->toArray()]);
    }
    public function UpdateInspectorDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validate request
            $this->validate($request, [
                'id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]);

            // Process request to create company
            $newInspectorData = $request->only('id', 'first_name', 'last_name', 'username', 'email');
            $newInspectorData ['role_id'] = 1;
            $newInspectorData ['password'] = bcrypt(request('password'));
            $createResponse = InspectorUtilities::updateInpector($newInspectorData);

            //TODO : confirm with Martin on checks
            if ($createResponse['data'][0]['id'] !== null && $createResponse['data'][0]['first_name'] === $newInspectorData['first_name']) {

                session()->forget('individualEditFlag');
                $request->session()->flash('success', 'Inspector has been Updated.');

                $request->session()->flash('id', $createResponse['data'][0]['id']);

                return back();
            } else {

                $request->session()->flash('error', 'Your request could not be completed.');
                return back()->withInput();
            }
        } else {
            // Display form to create company
            $pageData = collect(['title' => 'Create an Inpector']);

            return view('inspectors.add', ['pageData' => $pageData->toArray()]);
        }
    }
        public function addInspector(Request $request){
            if ($request->isMethod('post')) {
                // Validate request
                $this->validate($request, [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'username' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
                    'confirm_password' => 'required|same:password'
                ]);

                // Process request to create company
                $newInspectorData = $request->only('id', 'first_name', 'last_name', 'username', 'email');
                $newInspectorData ['role_id'] = 1;
                $newInspectorData ['password'] = bcrypt(request('password'));
                $createResponse = InspectorUtilities::addInspector($newInspectorData);

                //TODO : confirm with Martin on checks
                if ($createResponse['data'][0]['id'] !== null && $createResponse['data'][0]['first_name'] === $newInspectorData['first_name']) {
                    $request->session()->flash('success', 'Inspector has been created.');

                    $request->session()->flash('id', $createResponse['data'][0]['id']);

                    return back();
                } else {

                    $request->session()->flash('error', 'Your request could not be completed.');
                    return back()->withInput();
                }
            } else {
                // Display form to create company
                $pageData = collect(['title' => 'Create an Inpector']);

                return view('inspectors.add', ['pageData' => $pageData->toArray()]);
            }


        }


}