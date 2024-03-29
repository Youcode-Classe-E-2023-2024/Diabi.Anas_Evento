@extends('layout.layout')
@section('content')
<style>
    .category-icon {
    font-size: 16px; /* Adjust the font size as needed */
    color: #ffffff; /* Adjust the color as needed */
background-color: #0ea45e;
border-radius: 10px;
padding:4px 6px; 
}
.shadow{
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;}

.search-form {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}

/* Styling for the search input */
.search-input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: all 0.3s ease-in-out;
}

/* Styling for the search button */
.search-button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    margin-left: 10px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

/* Hover effect for the search input and button */
.search-input:hover,
.search-button:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Animation for the search input and button */
.search-input,
.search-button {
    transform: translateY(0);
    animation: translateYAnimation 1s ease-in-out infinite alternate;
}

@keyframes translateYAnimation {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-5px);
    }
}
</style>

<form action="{{ route('searchEvent') }}" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Rechercher par titre" class="search-input">
        <button type="submit" class="search-button">Rechercher</button>
    </form>

<section class="grid grid-cols-1 p-12 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-12 h-screen ">
    
    @forelse ($events as $event)
        <div
            class="w-full shadow   m-auto max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
            <a href="{{ url('events')}}/{{$event->id}}">
                <img class="p-8 rounded-t-lg" src="/docs/images/products/apple-watch.png" alt="product image" />
            </a>
            <div class="px-5 pb-5">
                <a href="{{ url('events')}}/{{$event->id}}">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-black">{{ $event->title }}
                    </h5>
                </a>
                <div class="flex items-center justify-between mt-2.5 mb-5">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>

                    </div>
                    <div class="category-icon">
                        <i class="fas fa-tag"></i> <!-- Font Awesome tag icon -->
                        {{ \App\Models\Categorie::find($event->categorie_id)->name }}
                    </div>
                    
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-gray-900 dark:text-black">$    {{ $event->price }}</span>
                    @if($event->available_places == 0)
                    <button disabled
                        class="text-white bg-gray-400 cursor-not-allowed focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600">Full</button>
                @else
                    <a href="{{ url('events')}}/{{$event->id}}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reserve</a>
                @endif </div>
            </div>
        </div>

    @empty
        <section class="flex absolut items-center flex-col w-[100vw] h-full"
            style="background:url('empty.jpg') no-repeat center ; background-size: cover">
        </section>
    @endforelse



</section>

@endsection
