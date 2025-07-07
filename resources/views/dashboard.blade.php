<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-pink-700 leading-tight">
            {{ __('Ecommerce Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-16">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-md p-10 text-center space-y-6">
                <h3 class="text-3xl font-bold text-pink-700">
                    {{ __('Welcome to your Ecommerce Dashboard!') }}
                </h3>
                <p class="text-gray-600 text-lg">
                    You are successfully logged in. Click below to access the Food Panda App via SSO.
                </p>

                <a href="http://foodpanda-app.iconicsolutionsbd.com/sso-login?token={{ $token }}" target="_blank"
                    class="inline-block px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition duration-200 shadow-md">
                    {{ __('Go to Food Panda App') }}
                </a>

                {{-- Logout button --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="mt-4 inline-block px-6 py-3 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-xl transition duration-200 shadow-md">
                        🚪 {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
