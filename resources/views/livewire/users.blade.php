<div class="w-1/2 m-auto my-10">
    {{-- Be like water. --}}
    <h1 class="text-3xl font-semibold text-blue-700">{{ $title }}</h1>
    <p>User Count: {{ count($users) }}</p>
    <button type="button" wire:click="createUser"
        class="my-2 px-5 py-2 cursor-pointer font-medium bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm">
        Create User
    </button>

    <hr class="border-1 my-5">

    <h2 class="text-2xl font-semibold mb-2">Users List</h2>
    <ul class="list-disc">
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>
