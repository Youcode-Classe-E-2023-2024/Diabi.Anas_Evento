@extends('layout.layout')

@section('content')

<div class="container mx-auto py-8">
    <div class="mb-4">
        <h2 class="text-2xl font-bold mb-2">Existing Categories</h2>
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Category Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-4">
        <h2 class="text-2xl font-bold mb-2">Add New Category</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <input type="text" name="name" class="w-full border p-2" placeholder="Enter category name">
            <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Category</button>
        </form>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-2">Delete Category</h2>
        <form action="{{ route('categories.destroySelected') }}" method="POST">
            @csrf
            @method('DELETE')
            <select name="category_ids[]" multiple class="w-full border p-2">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Selected Categories</button>
        </form>
    </div>
</div>

@endsection
