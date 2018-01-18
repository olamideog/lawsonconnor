<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Core\AdminCoreController;
use Illuminate\Support\Facades\Hash;

class AdminController extends AdminCoreController
{
    public function addItem(Request $request)
	{
		$admin = new $this->modelClass;
		
		$this->validate($request, array(
				'admin_firstname' => 'required|max:255|regex:/^[a-zA-Z]{1}/',
				'admin_lastname' => 'required|max:255|regex:/^[a-zA-Z]{1}/',
				'admin_username' => 'required|max:255|regex:/^[a-zA-Z]{1}/|unique:admin,admin_username',
				'admin_email' => 'required|max:255|email|unique:admin,admin_email'
		));
		
		$admin['admin_firstname'] = $request->input('admin_firstname');
		$admin['admin_lastname'] = $request->input('admin_lastname');
		$admin['admin_email'] = $request->input('admin_email');
		$admin['admin_username'] = $request->input('admin_username');
		if($request->has('admin_password'))
		{
			$admin['admin_password'] = Hash::make($request->input('admin_password'));
		}
		
		$admin->save();
		return redirect('/_admin/admin');
	}
	
	public function editItem(Request $request)
	{
		$this->validate($request, array(
				'admin_id' => 'required|max:255',
				'admin_firstname' => 'required|max:255|regex:/^[a-zA-Z]{1}/',
				'admin_lastname' => 'required|max:255|regex:/^[a-zA-Z]{1}/',
				'admin_username' => 'required|max:255|regex:/^[a-zA-Z]{1}/|unique:admin,admin_username,'.$request->input('admin_id').',admin_id',
				'admin_email' => 'required|max:255|email|unique:admin,admin_email,'.$request->input('admin_id').',admin_id'
		));
		
		$admin = $this->modelClass::find($request->input('admin_id'));
		
		$admin['admin_firstname'] = $request->input('admin_firstname');
		$admin['admin_lastname'] = $request->input('admin_lastname');
		$admin['admin_email'] = $request->input('admin_email');
		$admin['admin_username'] = $request->input('admin_username');
		if($request->has('admin_password'))
		{
			$admin['admin_password'] = Hash::make($request->input('admin_password'));
		}
		
		$admin->save();
		return redirect('/_admin/admin');		
	}
	
	public function deleteItem($itemId)
	{
	}
}
