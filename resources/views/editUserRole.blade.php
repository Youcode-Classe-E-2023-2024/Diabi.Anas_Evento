@extends('layout.layout')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Edit User Role</h2>

        <form action="{{ route('manageUsers.updateRole', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="role_id" class="block text-gray-600 text-sm font-medium">Select Role</label>
                <select id="role_id" name="role_id" class="mt-1 p-2 w-full border rounded-md">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Role</button>
        </form>
    </div>
@endsection