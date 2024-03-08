@extends('shared.layout')

@section('content')
    <div class="relative flex items-center justify-center min-h-screen overflow-hidden bg-gray-900">
        <div class="absolute inset-0">
            <svg class="absolute left-0 w-full h-full text-white transform -translate-x-1/2 lg:block" viewBox="0 0 100 100" fill="currentColor" preserveAspectRatio="none slice">
                <path d="M50 0H100L50 100H0L50 0Z"></path>
            </svg>
            <img
                class="object-cover w-full h-full opacity-40"
                src="BG.jpg"
            />
        </div>
        <div class="relative z-10 text-white">
            <div class="mb-16 lg:my-40 lg:max-w-lg lg:pr-5 animate__animated animate__fadeIn animate__delay-1s">
                <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
                    EVENTO
                </p>
                <h2 class="mb-5 font-sans text-6xl font-bold tracking-tight text-gray-100 sm:leading-none">
                    Everything you<br class="hidden md:block" />
                    can imagine
                    <span class="inline-block text-deep-purple-accent-400">is real</span>
                </h2>
                <p class="pr-5 mb-5 text-base text-gray-300 md:text-lg">
                    Evento is revolutionizing the way you discover and manage event tickets. Whether you're a participant seeking exciting experiences or an organizer aiming to host unforgettable events.
                </p>
                <div class="flex items-center">
                    <a
                        href="{{ route('register') }}"
                        class="inline-flex items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide text-white transition duration-200 transform bg-black rounded shadow-md hover:scale-105 focus:shadow-outline focus:outline-none"
                    >
                        Register
                    </a>
                    <a href="{{ route('login') }}" aria-label="" class="inline-flex items-center justify-center h-12 px-6 gap-1 border border-solid border-black rounded font-semibold  transition-colors duration-200 transform hover:scale-105 text-deep-purple-accent-700 bg-pink-500 text-white border-[0]">
                        <span>
                            Login
                        </span>
                        <ion-icon class="text-xl" name="arrow-forward-outline"></ion-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
