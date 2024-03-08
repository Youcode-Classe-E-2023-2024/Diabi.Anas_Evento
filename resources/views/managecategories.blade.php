@extends('layout.layout')

@section('content')

<div class="container mx-auto py-8">
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Existing Categories</h2>
        <div class="overflow-hidden border border-gray-300 rounded-lg">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($categories as $category)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Add New Category</h2>
        <form action="{{ route('categories.store') }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            <input type="text" name="name" class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter category name">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Add Category</button>
        </form>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4">Delete Category</h2>
        <form action="{{ route('categories.destroySelected') }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            @method('DELETE')
            <select name="category_ids[]" multiple class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Delete Selected Categories</button>
        </form>
    </div>
</div>

@endsection
