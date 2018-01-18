<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Core\AdminCoreController;
use Illuminate\Support\Facades\Hash;

class FilesController extends AdminCoreController
{
	public function index(){
		$this->data['rows'] = $this->modelClass::with('Admin')									
									->get();


		return view('_admin.'.$this->dir.'.index', $this->data);
	}

	public function showForm($itemId = 0){
		$this->data['viewed'] = array();
		if($itemId > 0)
		{
			$this->data['rows'] = $this->modelClass::with('Admin')
										->where('file_id', $itemId)
										->first();
			$viewed = \App\ViewedFiles::where('file_id', $itemId)->get(['user_id']);
			$viewed = $viewed->toArray();
			foreach($viewed as $v){
				$this->data['viewed'][] = $v['user_id'];
			}
		}
		$this->data['users'] = \App\User::all();
		return view('_admin.'.$this->dir.'.form', $this->data);
	}

    public function addItem(Request $request)
	{
		$files = new $this->modelClass;
		
		$this->validate($request, array(
				'file_name' => 'required|mimes:png,jpeg,doc,docx,pdf'
		));
		$fileName = \Carbon\Carbon::now()->format('U').'_'.$request->file('file_name')->getClientOriginalName();
		
		$fileType = $request->file('file_name')->getClientMimeType();

		$request->file('file_name')->move(
	        base_path() . '/public/files/', $fileName
	    );
		
		$files['file_name'] = $fileName;
		$files['file_type'] = $fileType;
		$files['admin_id'] = session('admin_id');
		
		$files->save();
		
		$fileid = $files['file_id'];

		if($request->has('user')){
			foreach($request->input('user') as $u){
				$user = new \App\ViewedFiles;
				$user['file_id'] = $fileid;
				$user['user_id'] = $u;
				$user->save();
			}
		}

		return redirect('/_admin/files');
	}
	
	public function editItem(Request $request)
	{
		$this->validate($request, array(
				'file_id' => 'required|max:255',
				'file_name' => 'required|mimes:png,jpeg,doc,docx,pdf'
		));

		$files = $this->modelClass::find($request->input('file_id'));

		$fileName = \Carbon\Carbon::now()->format('U').'_'.$request->file('file_name')->getClientOriginalName();

		$fileType = $request->file('file_name')->getClientMimeType();

		$request->file('file_name')->move(
	        base_path() . '/public/files/', $fileName
	    );
		
		$files['file_name'] = $fileName;
		$files['file_type'] = $fileType;
		$files['admin_id'] = session('admin_id');
		
		$files->save();

		$fileid = $files['file_id'];

		\App\ViewedFiles::where('file_id', $fileid)->delete();

		if($request->has('user')){
			foreach($request->input('user') as $u){
				$user = new \App\ViewedFiles;
				$user['file_id'] = $fileid;
				$user['user_id'] = $u;
				$user->save();
			}
		}

		return redirect('/_admin/files');		
	}

	public function stats($itemId){
		$this->data['rows'] = $this->modelClass::with('Admin')
										->with('ViewedFiles')																
										->with('ViewedFiles.UserViewed')
										->where('file_id', $itemId)
										->first();
		return view('_admin.'.$this->dir.'.stats', $this->data);
	}
	
	public function deleteItem($itemId)
	{
	}
}
