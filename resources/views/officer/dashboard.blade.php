<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('officer')->user()->name }} - ({{ Auth::guard('officer')->user()->email }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! and click to logout 
										<!-- Authentication -->
										<form method="POST" action="{{ route('officer.logout') }}">
												@csrf

												<x-dropdown-link :href="route('officer.logout')"
																onclick="event.preventDefault(); 
																this.closest('form').submit();">
														{{ __('Log Out') }}
												</x-dropdown-link>
										</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
