<?php

namespace Illuminate\Foundation\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
        
        session()->flash('message', 'Anda login sebagai - '.auth()->user()->level.'.');
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
        return $this->laravelRedirectPath();
    }
}
