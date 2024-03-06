@extends('layout.layout')
@section('content')

    <section class="h-full relative bg-[#161513] py-4">
        <div class="container mx-auto xl:px-32">
            <div class="grid items-center lg:grid-cols-2">
                <div class="mb-12 md:mt-12 lg:mt-0 lg:mb-0">
                    <div class="container mx-auto p-8">
                        <div class="bg-white p-6 rounded-md shadow-md">
                            <h1 class="text-3xl font-semibold mb-6">Réservation de places pour un événement</h1>

                            <form action="#" method="post" class="max-w-md mx-auto">
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-600 text-sm font-medium">Nom</label>
                                    <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md">
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-gray-600 text-sm font-medium">E-mail</label>
                                    <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
                                </div>

                                <div class="mb-4">
                                    <label for="event" class="block text-gray-600 text-sm font-medium">Événement</label>
                                    <select id="event" name="event" class="mt-1 p-2 w-full border rounded-md">
                                        <option value="concert">Concert</option>
                                        <option value="conference">Conférence</option>
                                        <option value="movie">Projection de film</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="seats" class="block text-gray-600 text-sm font-medium">Nombre de places</label>
                                    <input type="number" id="seats" name="seats" min="1" class="mt-1 p-2 w-full border rounded-md">
                                </div>

                                <div class="flex items-center justify-between">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Réserver</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>

@endsection
