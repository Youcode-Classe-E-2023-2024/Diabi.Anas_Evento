@extends('layout.layout')

@section('content')
    <style>
        .event-description {
            max-width: 60px;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            margin-top: 10px;
            overflow: hidden;
        }
    </style>
    @if ($user->role_id === 2)
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
                                <form action="{{ route('createevent') }}" method="post" class="max-w-md mx-auto">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name" class="block text-gray-600 text-sm font-medium">Title</label>
                                        <input type="text" id="name" name="title"
                                            class="mt-1 p-2 w-full border rounded-md">
                                        @error('title')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-4">
                                        <label for="description"
                                            class="block text-gray-600 text-sm font-medium">Description</label>
                                        <textarea id="description" name="description"
                                            class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-500 resize-none"
                                            rows="4"></textarea>
                                        @error('description')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label for="startDate" class="block text-gray-600 text-sm font-medium">Start
                                                Date</label>
                                            <input type="date" name="startDate" id="startDate"
                                                class="mt-1 p-2 w-full border rounded-md">
                                            @error('startDate')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="endDate" class="block text-gray-600 text-sm font-medium">End
                                                Date</label>
                                            <input type="date" name="endDate" id="endDate"
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
                                            <input type="number" name="guestCapacity" id="guestCapacity"
                                                class="mt-1 p-2 w-full border rounded-md">
                                            @error('guestCapacity')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="category"
                                                class="block text-gray-600 text-sm font-medium">Category</label>
                                            <select id="category" name="category"
                                                class="mt-1 p-2 w-full border rounded-md">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="category"
                                                class="block text-gray-600 text-sm font-medium">Method</label>
                                                <select id="method"  name="method" class="mt-1 p-2 w-full border rounded-md">
                                                    <option value="">Reservation Method</option>
                                                    <option value="A">auto</option>
                                                    <option value="M">Manuel</option>
                                                </select>
                                                @error('method')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label for="name" class="block text-gray-600 text-sm font-medium">Event
                                                Place</label>
                                            <input type="text" id="name" name="place"
                                                class="mt-1 p-2 w-full border rounded-md">
                                            @error('place')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="price"
                                                class="block text-gray-600 text-sm font-medium">Price</label>
                                            <input type="text" name="price" id="price" value="0"
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
    @endif



    <section class="h-screen">
        <div class="m-8">
            <h2 class="text-2xl font-bold mb-4">Events</h2>
            <div class="overflow-hidden border border-gray-300 rounded-lg">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Place
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Available Places</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ctegorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Start
                                Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End
                                Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if (session('deleted'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Success!</strong>
                                <span class="block sm:inline">{{ session('deleted') }}</span>
                            </div>
                        @endif
                        @if ($user->role_id === 1)
                            @foreach ($events as $event)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->title }}</td>
                                    <td class="event-description px-6 py-4">{{ $event->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->place }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->available_places }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ \App\Models\Categorie::find($event->categorie_id)->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->start_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->end_date }}</td>
                                    <td>
                                        <div class="flex">
                                            <a href="{{ url('event') }}/{{ $event->id }}">
                                                <button type="button"
                                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Update</button>
                                            </a>
                                            @if ($event->status == 'archived')
                                                <a href="{{ url('publish.event') }}/{{ $event->id }}">
                                                    <button type="button"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">publish</button>
                                                </a>
                                            @else
                                                <a href="{{ url('publish.event') }}/{{ $event->id }}">
                                                    <button type="button"
                                                        class="bg-cyan-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">archive</button>
                                                </a>
                                            @endif
                                            <a href="{{ route('drop.event', $event->id) }}">
                                                <button type="button"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                            </a>
                                        </div>
                                </tr>
                            @endforeach
                        @elseif ($user->role_id === 2)
                            @foreach ($userevents as $event)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->title }}</td>
                                    <td class="event-description px-6 py-4">{{ $event->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->place }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->available_places }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ \App\Models\Categorie::find($event->categorie_id)->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->start_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->end_date }}</td>
                                    <td>
                                        <div class="flex">
                                            <a href="{{ url('event') }}/{{ $event->id }}">
                                                <button type="button"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                                            </a>
                                            <a href="{{ route('drop.event', $event->id) }}">
                                                <button type="button"
                                                    class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                            </a>
                                        </div>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
