<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Users extends Component
{
    // public $title = "User Page - Livewire";

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email:dns|unique:users')]
    public $email = '';

    #[Validate('required|min:3')]
    public $password = '';

    public function createNewUser()
    {
        // $validated = $this->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required|min:3'
        // ]);

        // dd("button clicked!");

        // panggil validasi sblum kirim data
        $this->validate();

        User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => Hash::make($this->password)
        ]);

        // alt
        // User::create([
        //     "name" => $validated['name'],
        //     "email" => $validated['email'],
        //     "password" => Hash::make($validated['password'])
        // ]);

        // alternatif
        // User::create($validated);

        // $this->reset();
        $this->reset([
            "name",
            "email",
            "password"
        ]);

        session()->flash('success', 'User created successfully.');
    }

    public function render()
    {
        return view('livewire.users', [
            "title" => "User Page - Livewire",
            "users" => User::all()
        ]);
    }
}
