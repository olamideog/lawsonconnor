<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Core\AdminCoreController;
use App\Http\Controllers\Core\AdminAuthTraits;


class LoginController extends AdminCoreController
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

    use AuthenticatesUsers, AdminAuthTraits{
        AdminAuthTraits::guard insteadof AuthenticatesUsers;
        AdminAuthTraits::username insteadof AuthenticatesUsers;
    }

    protected function redirectTo(){
        $id = $this->guard()->id();
        $this->setUser();
        $AdminUser = \App\Admin::where('admin_id', $id)->first();
        $AdminUser['admin_lastlogin'] = \Carbon\Carbon::now();
        $AdminUser->save();
        return '/_admin/dashboard';
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

        return redirect('/_admin');
    }

    public function dashboard()
    {
        return view('_admin.dashboard.index', $this->data);
    }

    public function profile(){
        return view('profile.index', $this->data);
    }
}
