<?php

namespace Xoyal\Foxiedial\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Xoyal\Foxiedial\Models\FoxieApiDetails;
use Config;

class FoxieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "123"; exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valiadations
		$validator = Validator::make($request->all(),[
			'requested_by' 		=>  'required',
			'active'			=>	'required',			
		]);

		if($validator->passes())
		{
            //data insert in vicidial_campaigns table
			$FoxieApiDetails   	=   new FoxieApiDetails;
			
			$FoxieApiDetails 	= 	$FoxieApiDetails->add_foxie_api_details($request->input());

            return response()->json(['success' => true, 'code' => 200, 'message' => 'Data Added successfully', 'result' => $FoxieApiDetails]);
        }
        else
        {
            $errMessage = array();

			if($validator->errors()->get('requested_by'))
			{
				$errMessage['requested_by']   		=   array('code' => Config::get('constant_error.general.Error_1001'), 'errorMessage' => Config::get('constant_error.general.Message_1001'));
			}
			if($validator->errors()->get('active'))
			{
				$errMessage['active']   			=   array('code' => Config::get('constant_error.general.Error_1002'), 'errorMessage' => Config::get('constant_error.general.Message_1002'));
			}

			return response()->json(['success' => false, 'status'=>400, 'fields'=>$errMessage]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
