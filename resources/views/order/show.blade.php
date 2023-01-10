<x-layout>
    <x-slot name="header">
        {{ __('Home') }}
    </x-slot>

    <x-panel>
        {{ $user->name }}
    </x-panel>

</x-layout>
