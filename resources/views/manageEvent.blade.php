@extends('layout.layout')

@section('content')

<section class="flex items-center justify-center flex-col  h-full" style="background:url('eventwlp.png') no-repeat center center fixed; background-size: cover">
    <div class="  flex  justify-center items-center  ">
        <div class="grid  m-auto  ">
            <div class="mb-12  md:mt-12 lg:mt-0 lg:mb-0">
                <div class="container  mx-auto p-8">
                    <div class="bg-white p-6 rounded-md shadow-md">
                        <h1 class="text-3xl font-semibold mb-6">Créer un événement</h1>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('createevent') }}" method="post" class="max-w-md mx-auto">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-600 text-sm font-medium">Title</label>
                                <input type="text" id="name" name="title" class="mt-1 p-2 w-full border rounded-md">
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block text-gray-600 text-sm font-medium">Description</label>
                                <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-500 resize-none" rows="4"></textarea>
                            </div>
                            

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="startDate" class="block text-gray-600 text-sm font-medium">Start Date</label>
                                    <input type="date" name="startDate" id="startDate" class="mt-1 p-2 w-full border rounded-md">
                                </div>

                           

                                <div>
                                    <label for="endDate" class="block text-gray-600 text-sm font-medium">End Date</label>
                                    <input type="date" name="endDate" id="endDate" class="mt-1 p-2 w-full border rounded-md">
                                </div>

                                
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="guestCapacity" class="block text-gray-600 text-sm font-medium">Event Guest Capacity</label>
                                    <input type="number" name="guestCapacity" id="guestCapacity" class="mt-1 p-2 w-full border rounded-md">
                                </div>
                                
                     
                            </div>

                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
