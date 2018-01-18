<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Core\AdminCoreController;
use Illuminate\Support\Facades\Hash;

class UsersController extends AdminCoreController
{
    public function addItem(Request $request)
	{
		$user = new $this->modelClass;
		
		$this->validate($request, array(
				'user_firstname' => 'required|max:255|regex:/^[a-zA-Z]{1}/',
				'user_lastname' => 'required|max:255|regex:/^[a-zA-Z]{1}/',
				'user_name' => 'required|max:255|regex:/^[a-zA-Z]{1}/|unique:users,user_name',
				'user_email' => 'required|max:255|email|unique:users,user_email'
		));
		
		$user['user_firstname'] = $request->input('user_firstname');
		$user['user_lastname'] = $request->input('user_lastname');
		$user['user_email'] = $request->input('user_email');
		$user['user_name'] = $request->input('user_name');
		if($request->has('user_password'))
		{
			$user['user_password'] = Hash::make($request->input('user_password'));
		}
		
		$user->save();
		return redirect('/_admin/user');
	}
	
	public function editItem(Request $request)
	{
		$this->validate($request, array(
				'user_id' => 'required|max:255',
				'user_firstname' => 'required|max:255|regex:/^[a-zA-Z]{1}/',
				'user_lastname' => 'required|max:255|regex:/^[a-zA-Z]{1}/',
				'user_name' => 'required|max:255|regex:/^[a-zA-Z]{1}/|unique:users,user_name,'.$request->input('user_id').',user_id',
				'user_email' => 'required|max:255|email|unique:users,user_email,'.$request->input('user_id').',user_id'
		));
		
		$user = $this->modelClass::find($request->input('user_id'));
		
		$user['user_firstname'] = $request->input('user_firstname');
		$user['user_lastname'] = $request->input('user_lastname');
		$user['user_email'] = $request->input('user_email');
		$user['user_name'] = $request->input('user_name');
		if($request->has('user_password'))
		{
			$user['user_password'] = Hash::make($request->input('user_password'));
		}
		
		$user->save();
		return redirect('/_admin/user');
		
	}
	
	public function deleteItem($itemId)
	{
	}
}
