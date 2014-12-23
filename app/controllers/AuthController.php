<?php

class AuthController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.index');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin
	 *
	 * @return Response
	 */
	public function store()
	{  
	  	if ($this->isPostRequest()) {
      		$validator = $this->getLoginValidator();
  
	      	if ($validator->passes()) {
	       		$credentials = $this->getLoginCredentials();
	  
		        if (Auth::attempt($credentials)) {
		        	Session::flash('message', "Welcome Sir!");
		          	return Redirect::to("/");
		        }
	  
		        return Redirect::back()->withErrors([
		          "invalid_credential" => ["Credentials invalid."]
		        ]);
	      	} else {
	        	return Redirect::back()
		          ->withInput()
		          ->withErrors($validator);
	      	}
    	}
  
   		return View::make("admin.index");
	}

	/**
	 * Logout
	 *
	 * @return Response
	 * @author 
	 **/
	public function logout()
	{
		Auth::logout();
		Session::flash('message', "Logout success sir!");
		return Redirect::to('/');
	}

	//Check user's post request
	protected function isPostRequest()
  	{
    	return Input::server("REQUEST_METHOD") == "POST";
  	}
  
  	//Validate
  	protected function getLoginValidator()
  	{
	    return Validator::make(Input::all(), [
	      "email" => "required|email",
	      "password" => "required"
	    ]);
  	}

  	//Get Login Credentials
	protected function getLoginCredentials()
  	{
	    return [
	      "email" => Input::get("email"),
	      "password" => Input::get("password")
	    ];
  	}
}