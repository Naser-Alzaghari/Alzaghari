

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css">
    <style>
        body {
            background: linear-gradient(135deg, #4364de 0%, #a0a0a0 100%);
            min-height: 100vh;
            margin: 0;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .gradient-container {
            background: linear-gradient(135deg, rgba(247, 248, 255, 0.5) 0%, rgba(241, 245, 255, 0.5) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .error {
            color: red;
        }
    </style>
</head>
<body class="py-5">    
    <!-- Navbar -->
    

    <!-- Form Container -->
    <div class="container flex flex-col mx-auto rounded-lg pt-12 my-5">
        <nav class="w-full py-5 bg-gray-800">
            <div class="text-center">
                <a href="/" class="text-white text-2xl font-bold">
                    <img src="{{ asset('user_assets/img/logo/logo-white.png') }}" alt="Logo" class="h-8 inline" style="height: 60px;">
                </a>
            </div>
        </nav>
        <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
        
            <div class="flex items-center justify-center w-full lg:p-12">
                <div class="flex items-center xl:p-10">
                    <form method="POST" action="{{ route('login') }}" class="flex flex-col w-full h-full pb-6 text-center gradient-container rounded-3xl p-8">
                        @csrf
                        <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Sign In</h3>
                        
                        <label for="email" class="mb-2 text-sm text-start text-grey-900">Email*</label>
                        <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus autocomplete="username" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                        
                        
                        
                        <label for="password" class="mb-2 mt-5 text-sm text-start text-grey-900">Password*</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 error" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 error" />
                        
                        {{-- <div class="flex flex-row justify-between mb-8 mt-5">
                            <label class="relative inline-flex items-center mr-3 cursor-pointer select-none">
                                <input type="checkbox" name="remember" id="remember_me" class="sr-only peer">
                                <div class="w-5 h-5 bg-transparent border-2 rounded-sm border-grey-500 peer peer-checked:border-0 peer-checked:bg-purple-blue-500">
                                    <img class="" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/icons/check.png" alt="tick">
                                </div>
                                <span class="ml-3 text-sm font-normal text-grey-900">Keep me logged in</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a class="mr-4 text-sm font-medium text-purple-blue-500" href="{{ route('password.request') }}">
                                    {{ __('Forget password?') }}
                                </a>
                            @endif
                        </div> --}}
                        <button class="w-full px-6 py-5 mb-5 mt-6 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500">Sign In</button>
                        <p class="text-sm leading-relaxed text-grey-900">Not registered yet? <a href="{{ route('register') }}" class="font-bold text-grey-700">Create an Account</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
