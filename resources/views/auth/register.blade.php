<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Profile Image -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('Profile Image')" />
            <input id="image" type="file" name="image" accept="image/*" class="block mt-1 w-full" />

            <!-- Preview + Remove -->
            <div class="mt-2">
                <img id="preview" src="#" alt="Preview" class="rounded-full h-32 w-32 object-cover border hidden">

                <button type="button" id="removeImageBtn"
                    class="ml-2 px-3 py-1 bg-red-500 text-white rounded text-sm hidden">
                    Remove
                </button>
            </div>

            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    {{-- preview image script --}}
    <script>
    const imageInput   = document.getElementById('image');
    const preview      = document.getElementById('preview');
    const removeBtn    = document.getElementById('removeImageBtn');
    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file && file.type.startsWith('image/')) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
            removeBtn.classList.remove('hidden');
        } else {
            resetImage();
        }
    });
    removeBtn.addEventListener('click', resetImage);

    function resetImage() {
        imageInput.value = '';         
        preview.src      = '#';
        preview.classList.add('hidden');
        removeBtn.classList.add('hidden');
    }
</script>
</x-guest-layout>