<?php

namespace Sokeio\CmsTheme\Livewire\Auth;

use Sokeio\Component;
use Illuminate\Support\Facades\Auth;

class ForgotPassword extends Component
{
    public $username;
    public $password;
    public $isRememberMe;

    protected $rules = [
        'password' => 'required|min:1',
        'username' => 'required|min:1',
    ];
    public function DoWork()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->username, 'password' => $this->password], $this->isRememberMe)) {
            return redirect('/');
        } else {
            $this->showMessage("Login Fail");
        }
    }
    public function mount()
    {
    }
    public function render()
    {
        return view_scope('admin::auth.forgot-password',[
            'page_title'=>__('Forgot password')
        ]);
    }
}