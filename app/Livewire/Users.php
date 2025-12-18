<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    // public $title = "User Page - Livewire";

    public function createUser()
    {
        // dd("button clicked!");
        User::create([
            "name" => "User " . rand(1, 100),
            "email" => "user" . rand(1, 100) . "@example.com",
            "password" => bcrypt("password")
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
