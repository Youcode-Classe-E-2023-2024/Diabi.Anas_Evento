@extends('layout.layout')
@section('content')


<section class="flex items-center justify-center flex-col h-full"
style="background:url('eventwlp.png') no-repeat center center fixed; background-size: cover">
<div class="flex justify-center items-center">
    <div class="grid m-auto">
        <div class="mb-12 md:mt-12 lg:mt-0 lg:mb-0">
            <div class="container mx-auto p-8">
                <div class="bg-white p-6 rounded-md shadow-md">
                    <h1 class="text-3xl font-semibold mb-6">Créer un événement</h1>
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    <form action="{{ route('update.event', $event->id) }}" method="post" class="max-w-md mx-auto">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-600 text-sm font-medium">Title</label>
                            <input type="text" id="name" value="{{$event->title}}" name="title"
                                class="mt-1 p-2 w-full border rounded-md">
                            @error('title')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description"
                                class="block text-gray-600 text-sm font-medium">Description</label>
                            <textarea id="description"  name="description"
                                class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-500 resize-none"
                                rows="4"> {{$event->description}}</textarea>
                            @error('description')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="startDate" class="block text-gray-600 text-sm font-medium">Start
                                    Date</label>
                                <input type="date" name="startDate" value="{{$event->start_date}}" id="startDate"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('startDate')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="endDate" class="block text-gray-600 text-sm font-medium">End
                                    Date</label>
                                <input type="date" name="endDate" value="{{$event->end_date}}" id="endDate"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('endDate')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="guestCapacity" class="block text-gray-600 text-sm font-medium">Event
                                    Guest Capacity</label>
                                <input type="number" value="{{ $event->available_places}}" name="guestCapacity" id="guestCapacity"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('guestCapacity')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="category"
                                    class="block text-gray-600 text-sm font-medium">Category</label>
                                <select id="category" name="category" class="mt-1 p-2 w-full border rounded-md">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $event->category->id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="name" class="block text-gray-600 text-sm font-medium">Event
                                    Place</label>
                                <input type="text" id="name" value="{{ $event->place}}" name="place"
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('place')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-600 text-sm font-medium">Price $</label>
                                <input type="text" name="price" value="{{ $event->price}}" id="price" 
                                    class="mt-1 p-2 w-full border rounded-md">
                                @error('price')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>




@endsection