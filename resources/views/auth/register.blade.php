<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css">
        <style>
            body {
                background: linear-gradient(135deg, #4364de 0%, #a0a0a0 100%);
                min-height: 100vh;
                margin: 0;
                background-attachment: fixed;
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
        <div class="container flex flex-col mx-auto rounded-lg pt-12 my-5">
            <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
                <div class="flex items-center justify-center w-full lg:p-12">
                    <div class="flex items-center xl:p-10">
                        <form method="POST" action="{{ route('register') }}" class="flex flex-col w-full h-full pb-6 text-center gradient-container rounded-3xl p-8">
                            @csrf
                            <h3 class="mb-3 text-4xl font-extrabold text-dark-grey-900">Register</h3>
                            
                            <!-- Name -->
                            <label for="name" class="mb-2 text-sm text-start text-grey-900">Name*</label>
                            <input id="name" type="text" name="name" value="{{old('name')}}" required autofocus autocomplete="name" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2 error" />
                            
                            <!-- Email Address -->
                            <label for="email" class="mb-2 text-sm text-start text-grey-900 mt-5">Email*</label>
                            <input id="email" type="email" name="email" value="{{old('email')}}" required autocomplete="username" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 error" />
                            
                            <!-- Password -->
                            <label for="password" class="mb-2 text-sm text-start text-grey-900 mt-5">Password*</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 error" />
                            
                            <!-- Confirm Password -->
                            <label for="password_confirmation" class="mb-2 text-sm text-start text-grey-900 mt-5">Confirm Password*</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl"/>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 error" />
                            
                            <div class="flex-column items-center justify-end mt-4">
                                

                                <button class="block w-full px-6 py-5 mb-5 mt-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-purple-blue-600 focus:ring-4 focus:ring-purple-blue-100 bg-purple-blue-500">
                                    {{ __('Register') }}
                                </button>
                                <a class="block underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
