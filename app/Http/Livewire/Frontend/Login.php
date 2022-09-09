<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email,  $password;

    protected $rules = [
        'email'        => 'required|email',
        'password'     => 'required'
    ];

    protected $validationAttributes = [
        'email'        => 'Email',
        'password'     => 'Password',
    ];
    protected $messages = [
        'required'      => ':attribute wajib diisi',
    ];

    public function resetForm()
    {
        $this->email      = '';
        $this->password = '';
        $this->resetErrorBag();
    }

    public function Login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('dashboard');
        } else {
            $this->password = '';
            return session()->flash('error', 'Email atau Password Anda salah!.');
        }
    }
    public function render()
    {
        return view('livewire.frontend.login');
    }
}