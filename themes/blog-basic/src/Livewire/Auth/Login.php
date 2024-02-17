<?php

namespace Sokeio\CmsTheme\Livewire\Auth;

use Sokeio\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $username;
    public $password;
    public $isRememberMe;
    public $url_ref;

    protected $rules = [
        'password' => 'required|min:1',
        'username' => 'required|min:1',
    ];
    public function DoWork()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->username, 'password' => $this->password], $this->isRememberMe)) {
            return redirect($this->url_ref);
        } else {
            $this->addError('account_error', 'Invalid account or password');
        }
    }
    public function mount()
    {
        $this->url_ref = urldecode(request('ref')) ?? route('admin.dashboard');
    }
    public function render()
    {
        return view_scope('admin::auth.login', [
            'page_title' => __('Login to your account')
        ]);
    }
}
