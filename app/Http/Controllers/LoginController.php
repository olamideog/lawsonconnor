<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Core\CoreController;
use App\Http\Controllers\Core\AuthTraits;


class LoginController extends CoreController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    | As Laravel comes with the AutehticateUsers trait, in order to override the default methods
    | I had to create a trait and use the insteadof operator to set the other of precedence
    */

    use AuthenticatesUsers, AuthTraits{
        AuthTraits::guard insteadof AuthenticatesUsers;
        AuthTraits::username insteadof AuthenticatesUsers;
    }

    protected function redirectTo(){
        $id = $this->guard()->id();
        $this->setUser();
        $User = \App\User::where('user_id', $id)->first();
        $User['user_lastlogin'] = \Carbon\Carbon::now();
        $User->save();
        return '/dashboard';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request=null)
    {
        $this->guard()->logout();
        if(!empty($request)){
            $request->session()->invalidate();
        }
        return redirect('/');
    }

    public function dashboard()
    {
        $this->data['rows'] = \App\User::with('ViewedFiles.FileViewed')
                                        ->where('user_id', session('user_id'))
                                        ->get();
        return view('dashboard.index', $this->data);
    }

    public function profile(){
        return view('profile.index', $this->data);
    }

    public function viewfile($itemId=null){
        if(!empty($itemId))
        {
            $file = \App\Files::where('file_id', $itemId)->first();

            $viewed = \App\ViewedFiles::where('file_id', $itemId)
                                        ->where('user_id', session('user_id'))
                                        ->first();

            $viewed['status'] = 1;
            $viewed['viewed_on'] = \Carbon\Carbon::now();
            $viewed->save();

            return response()->download(base_path() . '/public/files/'.$file['file_name']);
        }
        return redirect('/dashboard');
    }
}
