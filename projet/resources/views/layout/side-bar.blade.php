<div class="navigation">
    <ul style="padding-top: 10px;">
        <li>
            <a href="#">
                <span class="icona"
                    style="background-color: white; display: flex; justify-content: center; align-items: center; border-radius: 100%;">
                    <img src="{{ asset('imgs/logo.svg') }}" alt="" width="50" class="w-20">
                </span>
                <span class="title">EVENTO</span>
            </a>
        </li>

        @php
        if (Auth::check()) {
            $user = Auth::user();
        }
    @endphp
    <h6 class="">Welcom :             {{ $user->name }}
    </h6>
    <h6 >Role :                         {{ \App\Models\role::find($user->role_id)->name }}

    </h6>
        <li class="{{ $black_hover == 'home' ? 'black_hover' : '' }}">
            <a href="{{ route('main') }}">
                <span class="icons">
                </span>
                <span class="title">Home</span>
            </a>
        </li>

        <li class="{{ $black_hover == 'Reserve a ticket' ? 'black_hover' : '' }}">
            <a href="{{ route('reserve') }}">
                <span class="icona">
                </span>
                <span class="title">Reserve a ticket</span>
            </a>
        </li>
        @php
            $userRole = null;
            if (Auth::check()) {
                $userRole = Auth::user()->role;
            }
        @endphp

        @if (Auth::check() && ($userRole->id === 1 || $userRole->id === 2))
            <!-- Ces éléments ne seront affichés que pour les Organisateurs et les Administrateurs -->
            <li class="{{ $black_hover == 'Be an organizer' ? 'black_hover' : '' }}">
                <a href="{{ route('subscribe') }}">
                    <span class="icona">
                    </span>
                    <span class="title">Be an organizer</span>
                </a>
            </li>
            <li class="{{ $black_hover == 'Manage events' ? 'black_hover' : '' }}">
                <a href="{{ route('manageEvents') }}">
                    <span class="icona">
                    </span>
                    <span class="title">Manage Events</span>
                </a>
            </li>
            <!-- Rest of the elements -->
           
        @endif

        @if (Auth::check() && $userRole && $userRole->id === 1)
            <!-- Ces éléments ne seront affichés que pour les Administrateurs -->
            <li class="{{ $black_hover == 'Manage categories' ? 'black_hover' : '' }}">
                <a href="{{ route('managecategorie') }}">
                    <span class="icona">
                    </span>
                    <span class="title">Manage categories</span>
                </a>
            </li>
            <!-- Rest of the elements -->

            

            <li class="{{ $black_hover == 'Manage users' ? 'black_hover' : '' }}">
                <a href="{{ route('manageUsers') }}">
                    <span class="icona">
                    </span>
                    <span class="title">Manage users</span>
                </a>
            </li>
            <li class="{{ $black_hover == 'statistics' ? 'black_hover' : '' }}">
                <a href="{{ route('statistics') }}">
                    <span class="icona">
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <!-- Ajoutez d'autres fonctionnalités spécifiques aux Administrateurs ici -->
        @endif

        @if (Auth::check())
            <!-- User is logged in -->
            <li class="{{ $black_hover == 'Profile' ? 'black_hover' : '' }}">
                <a href="#">
                    <span class="icona">
                    </span>
                    <span class="title">Profile</span>
                </a>
            </li>

            <li class="{{ $black_hover == 'Sign Out' ? 'black_hover' : '' }}">
                <a href="{{ route('logout') }}">
                    <form action="{{ route('logout') }}" method="POST" class="icona">
                        @csrf
                        <button type="submit" class="title bg-transparent border-0 text-white">Sign Out</button>
                    </form>
                </a>
            </li>
        @else
            <!-- User is not logged in -->
            <li class="{{ $black_hover == 'Login/Register' ? 'black_hover' : '' }}">
                <a href="{{ route('login') }}">
                   
                    <span class="title">Login</span>
                </a>
            </li>
            <li class="{{ $black_hover == 'Login/Register' ? 'black_hover' : '' }}">
                <a href="{{ route('register') }}">

                    <span class="title">Register</span>
                </a>
            </li>
        @endif

        <li>
            <ion-icon class="toggle text-white" name="chevron-back-outline"></ion-icon>
        </li>
    </ul>
</div>
