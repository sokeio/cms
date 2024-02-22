<?php

namespace Sokeio\CmsTheme\Livewire\Auth;

use Sokeio\Component;

class Signup extends Component
{
    public $email;
    public $name;
    public $password;
    public $agree;
    protected $rules = [
        'password' => 'required|min:6',
        'name' => 'required|min:6',
        'email' => 'required|email:rfc,dns|unique:users,email',
        'agree' => 'required',
    ];
    public function DoWork()
    {
        $this->validate();
        $user = new (config('sokeio.model.user'));
        $user->email = $this->email;
        $user->name = $this->name;
        $user->password = $this->password;
        $user->status = 1;
        $user->save();
        if ($role = env('SOKEIO_SIGUP_ROLE_DEFAULT')) {
            $role =   (config('sokeio.model.role'))::where('slug', $role)->first();
            if ($role)
                $user->roles()->sync([$role->id]);
        }
        return redirect(route('site.login'));
    }
    public function mount()
    {
    }
    public function render()
    {
        return view_scope('theme::auth.sign-up', [
            'page_title' => __('Sigup account')
        ]);
    }
}
