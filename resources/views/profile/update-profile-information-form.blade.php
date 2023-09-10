<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="name" value="{{ __('Name') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-solid fa-user"></i>
            </span>
            <x-input id="name" type="text" class="mt-1 relative block w-full pl-10" wire:model.defer="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="date_of_birth" value="{{ __('Date of Birth') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-solid fa-baby"></i>
            </span>
            <x-input id="date_of_birth" type="date" class="mt-1 relative block w-full pl-10" wire:model.defer="state.date_of_birth" required autocomplete="date_of_birth" />
            <x-input-error for="date_of_birth" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="location" value="{{ __('Location') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-solid fa-location-crosshairs"></i>
            </span>
            <x-input id="location" type="text" class="mt-1 relative block w-full pl-10" wire:model.defer="state.location" required autocomplete="location" />
            <x-input-error for="location" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="phone" value="{{ __('Phone') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-solid fa-phone"></i>
            </span>
            <x-input id="phone" type="text" class="mt-1 relative block w-full pl-10" wire:model.defer="state.phone" required autocomplete="phone" />
            <x-input-error for="phone" class="mt-2" />
        </div>

         <!-- Occupation -->
         <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="occupation" value="{{ __('Occupation') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-solid fa-address-card"></i>
            </span>
            <x-input id="occupation" type="text" class="mt-1 relative block w-full pl-10" wire:model.defer="state.occupation" required autocomplete="occupation" />
            <x-input-error for="occupation" class="mt-2" />
        </div>

        <!-- bio -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="bio" value="{{ __('Bio') }}" />
            <textarea id="bio" wire:model.defer="state.bio" class="lg:h-40 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" type="text" name="bio"></textarea>
            <x-input-error for="bio" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="email" value="{{ __('Email') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-solid fa-envelope"></i>
            </span>
            <x-input id="email" type="email" class="mt-1 relative block w-full pl-10" wire:model.defer="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
        
        <div class="col-span-6 sm:col-span-4">
            <span class="font-semibold text-lg">
                {{ __('Update your Links\'s information and CV drive link.') }}
            </span>
        </div>

         <!-- Medium -->
         <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="medium" value="{{ __('Medium') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-brands fa-medium"></i>
            </span>
            <x-input id="medium" type="url" class="mt-1 relative block w-full pl-10" wire:model.defer="state.medium" autocomplete="medium" />
            <x-input-error for="medium" class="mt-2" />
        </div>

        <!-- Twitter -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="twitter" value="{{ __('Twitter') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-brands fa-twitter"></i>
            </span>
            <x-input id="twitter" type="url" class="mt-1 relative block w-full pl-10" wire:model.defer="state.twitter" autocomplete="twitter" />
            <x-input-error for="twitter" class="mt-2" />
        </div>

        <!-- Dribble -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="dribble" value="{{ __('Dribble') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-solid fa-basketball"></i>
            </span>
            <x-input id="dribble" type="url" class="mt-1 relative block w-full pl-10" wire:model.defer="state.dribble" autocomplete="dribble" />
            <x-input-error for="dribble" class="mt-2" />
        </div>

        <!-- Linkedin -->
        <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="linkedin" value="{{ __('Linkedin') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-brands fa-linkedin"></i>
            </span>
            <x-input id="linkedin" type="url" class="mt-1 relative block w-full pl-10" wire:model.defer="state.linkedin" autocomplete="linkedin" />
            <x-input-error for="linkedin" class="mt-2" />
        </div>

         <!-- CV drive -->
         <div class="col-span-6 sm:col-span-4 relative flex w-full flex-wrap items-stretch mb-3">
            <x-label for="CV_drive" value="{{ __('CV drive') }}" />
            <span class="z-10 h-full leading-snug font-normal absolute text-centerbg-transparent rounded text-base items-center justify-center w-8 pl-3 py-9">
                <i class="fa-solid fa-file"></i>
            </span>
            <x-input id="CV_drive" type="url" class="mt-1 relative block w-full pl-10" wire:model.defer="state.CV_drive" autocomplete="CV_drive" />
            <x-input-error for="CV_drive" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
