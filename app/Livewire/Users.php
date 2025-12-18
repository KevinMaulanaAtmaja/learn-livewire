<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    // public $title = "User Page - Livewire";

    public $name = '';
    public $email = '';
    public $password = '';

    public function createNewUser()
    {
        // dd("button clicked!");
        User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => Hash::make($this->password)
        ]);

        // $this->reset();
        $this->reset([
            "name",
            "email",
            "password"
        ]);
    }

    public function render()
    {
        return view('livewire.users', [
            "title" => "User Page - Livewire",
            "users" => User::all()
        ]);
    }
}
