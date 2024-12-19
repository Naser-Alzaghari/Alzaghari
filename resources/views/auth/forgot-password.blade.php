<x-guest-layout>
    <!-- Remove any default padding/margins from guest layout if needed -->
    <style>
        body {
            margin: 0;
            padding: 0;
        }
    </style>

    <div class="min-h-screen w-full bg-gradient-to-br from-[#f5f4ff] to-[#fef4ff] flex flex-col items-center justify-center p-4">
        <!-- Logo Section -->
        <div class="w-full max-w-md text-center mb-8">
            <img src="{{ asset('path-to-your-logo.svg') }}" alt="Alzaghari" class="h-8 mx-auto mb-2">
            <h1 class="text-4xl font-bold text-[#434ce6]">ALZAGHARI</h1>
        </div>

        <!-- Login Card -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-900">Welcome Back</h2>
                <p class="text-gray-600 mt-2">Please sign in to continue</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-gray-600 mb-2">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-400">@</span>
                        </div>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-[#434ce6] focus:ring focus:ring-[#434ce6] focus:ring-opacity-50"
                            placeholder="name@example.com"
                            required 
                            autofocus
                        />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block text-gray-600 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-[#434ce6] focus:ring focus:ring-[#434ce6] focus:ring-opacity-50"
                            placeholder="Enter your password"
                            required
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="flex items-center justify-between mt-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            class="rounded border-gray-300 text-[#434ce6] focus:ring-[#434ce6]" 
                            name="remember"
                        >
                        <span class="ml-2 text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-[#434ce6] hover:text-[#3238b5]">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <!-- Sign In Button -->
                <button type="submit" class="w-full bg-[#434ce6] text-white py-3 px-4 rounded-lg hover:bg-[#3238b5] transition-colors mt-6">
                    SIGN IN
                </button>

                <!-- Sign Up Link -->
                <div class="text-center mt-6">
                    <p class="text-gray-600">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-[#434ce6] hover:text-[#3238b5] ml-1">
                            Sign up
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>