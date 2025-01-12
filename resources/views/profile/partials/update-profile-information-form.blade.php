<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Surname -->
        <div>
            <x-input-label for="surname" :value="__('Surname')" />
            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', $user->surname)" required autocomplete="surname" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
        </div>

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <!-- Bio -->
        <div>
    <x-input-label for="bio" :value="__('About Me')" />
    <x-text-input id="bio" name="bio" type="textarea" class="mt-1 block w-full" :value="old('bio', $user->bio)" required autocomplete="bio" />
    <x-input-error class="mt-2" :messages="$errors->get('bio')" />
</div>


    <!-- Birthday -->
    <div>
        <x-input-label for="birthday" :value="__('Birthday')" />
        <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full" :value="old('birthday', $user->birthday)" required autocomplete="birthday" />
        <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
    </div>

    <div>
        <x-input-label for="profile_picture" :value="__('Profile Picture')" />
        <input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full" accept="image/*" />
        <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
    </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Profile Visibility -->
        <div>
            <x-input-label for="visibility" :value="__('Profile Visibility')" />
            <div class="flex items-center gap-4">
                <label for="visibility_username" class="inline-flex items-center">
                    <input type="radio" id="visibility_username" name="visibility" value="username" class="mr-2" @checked(old('visibility', $user->visibility) == 'username') />
                    {{ __('Display Username') }}
                </label>

                <label for="visibility_name_surname" class="inline-flex items-center">
                    <input type="radio" id="visibility_name_surname" name="visibility" value="name_surname" class="mr-2" @checked(old('visibility', $user->visibility) == 'name_surname') />
                    {{ __('Display Name and Surname') }}
                </label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('visibility')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
<style>
    <style>
/* General Form Styling */
form {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    font-family: Arial, sans-serif;
}

/* Header */
header h2 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 5px;
}

header p {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 20px;
}

/* Labels */
label {
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
    display: block;
}

/* Inputs */
input[type="text"],
input[type="email"],
input[type="date"],
textarea,
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="date"]:focus,
textarea:focus,
select:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
    outline: none;
}

textarea {
    height: 100px;
    resize: vertical;
}

/* Radio Buttons */
input[type="radio"] {
    accent-color: #4CAF50;
}

/* Buttons */
button,
.x-primary-button {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover,
.x-primary-button:hover {
    background-color: #45a049;
}

/* Error Messages */
.x-input-error {
    color: #dc3545;
    font-size: 0.85rem;
    margin-top: 5px;
}

/* Flex Containers */
.flex {
    display: flex;
    align-items: center;
    gap: 10px;
}

.flex.items-center.gap-4 {
    margin-top: 20px;
    justify-content: space-between;
}

/* Success Message */
.text-green-600 {
    color: #28a745;
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    form {
        padding: 15px;
    }

    header h2 {
        font-size: 1.3rem;
    }

    button,
    .x-primary-button {
        width: 100%;
    }
}
</style>
