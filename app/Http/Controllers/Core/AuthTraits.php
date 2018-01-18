<?php
namespace App\Http\Controllers\Core;

use Illuminate\Support\Facades\Auth;

trait AuthTraits{

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'user_name';
    }    

    /**
     * Get the login guard to be used by the controller.
     *
     * @return string
     */
    protected function guard(){
        return Auth::guard('users');
    }

    protected function setUser(){
        if ($this->guard()->check()) {
            $data = $this->guard()->user();

            session(['user_id' => $data->user_id,
                'user_firstname' => $data->user_firstname,
                'user_lastname' => $data->user_lastname,
                'user_email' => $data->user_email,
                'status' => true
            ]);
        }
    }
}
?>