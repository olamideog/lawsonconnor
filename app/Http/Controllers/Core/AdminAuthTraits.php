<?php
namespace App\Http\Controllers\Core;

use Illuminate\Support\Facades\Auth;

trait AdminAuthTraits{
	/**
     * Set the path to the login route.
     *
     * @return string
     */
    protected $loginPath = '/_admin';

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'admin_username';
    }

    /**
     * Get the login guard to be used by the controller.
     *
     * @return string
     */
    protected function guard(){
        return Auth::guard('admin');
    }

    protected function setUser(){
        if ($this->guard()->check()) {
            $data = $this->guard()->user();

            session(['admin_id' => $data->admin_id,
                'admin_firstname' => $data->admin_firstname,
                'admin_lastname' => $data->admin_lastname,
                'admin_email' => $data->admin_email,
                'status' => true
            ]);
        }
    }
}
?>