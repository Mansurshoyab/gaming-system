<x-authorize-layout :page="__('Admin Login')" >

  @push('title')
    <div class="text-center mb-8" >
      <h1 class="text-3xl font-bold text-gold" >{{ __('Casino King') }}</h1>
      <p class="text-sm text-gray-400" >{{ __('Play. Win. Earn.') }}</p>
    </div>
  @endpush

  <x-form-design :action="route('login')" :class="__('space-y-6')" >
    <div>
      <label for="identifier" class="block text-sm font-medium" >{{ __('Username / Email') }}</label>
      <input type="text" name="identifier" class="w-full mt-1 px-4 py-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="identifier" placeholder="Enter your email" value="{{ old('identifier', 'king@casino.com') }}" required />
      @if ($errors->has('identifier'))
        <p class="text-red-500 text-sm mt-1">{{ $errors->first('identifier') }}</p>
      @endif
    </div>
    <div>
      <label for="password" class="block text-sm font-medium" >{{ __('Password') }}</label>
      <input type="password" name="password" class="w-full mt-1 px-4 py-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" id="password" placeholder="Enter your password" value="{{ __('12345678') }}" required />
      @if ($errors->has('password'))
        <p class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</p>
      @endif
    </div>
    <div class="flex items-center justify-between text-sm text-gray-400" >
      <label class="flex items-center space-x-2" for="remember_me" >
        <input type="checkbox" name="remember" class="form-checkbox text-yellow-500 bg-gray-800 rounded" id="remember_me" />
        <span>{{ __('Remember Me') }}</span>
      </label>
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="hover:underline text-yellow-400" >{{ __('Forgot Password?') }}</a>
      @endif
    </div>
    <div>
      <button type="submit" class="w-full py-2 px-4 bg-yellow-500 rounded-lg text-black font-semibold hover:bg-yellow-400 transition duration-200" >
        <span>{{ __('Login') }}</span>
      </button>
    </div>
  </x-form-design>

  @push('scripts')
  @endpush

</x-authorize-layout>
