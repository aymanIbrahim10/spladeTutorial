<x-layout>
    <x-slot name="header">
        {{ __('Home') }}
    </x-slot>

    <x-panel>

        <x-splade-form :default="$user" :action="route('user.update', $user)" unguarded confirm="هل تريد تحديث البيانات "
            confirm-text="هل انت متاكد من هذا" confirm-button="نعم , اريد ذلك" cancel-button="لا , لا اريد ذلك"
            class="space-y-4">

            <x-splade-input type="text" v-model="form.name" label="Name :" class="form-control" />
            <p v-text="form.errors.name" class="text-danger" />
            <x-splade-input type="email" v-model="form.email" label="Email Address :" class="form-control" />
            <x-splade-input name="scheduled_period" date range time />
            <x-splade-textarea name="biography" autosize />
            <p v-text="form.errors.email" class="text-danger" />
            <x-splade-select name="country_code" label="Country" :options="$countries" choices multiple />
            <p>
                <button type="submit"> Update Data</button>
            </p>

            <x-splade-checkbox name="agree_terms" label="هل انت موافق" />

            <x-splade-group name="roles" label="Roles :" inline>
                <x-splade-checkbox name="roles[]" value="editor" label="editor" />
                <x-splade-checkbox name="roles[]" value="writor" label="writor" />
                {{-- <p v-text="form.errors.roles" class="text-danger" /> --}}
            </x-splade-group>
            <x-splade-submit />
            <x-splade-group label="Choose a theme" name="theme" inline>
                <x-splade-radio name="theme" value="dark" label="Dark theme" />
                <x-splade-radio name="theme" value="light" label="Light theme" />
            </x-splade-group>
        </x-splade-form>


    </x-panel>

</x-layout>
