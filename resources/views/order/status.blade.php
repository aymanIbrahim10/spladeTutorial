<x-layout>
    <x-slot name="header">
        {{ __('Home') }}
    </x-slot>

    <x-panel >
        Status : {{ $order -> status }}




        <x-splade-event private channel="shop" listen="OrderStatusWasChange" />
        
    </x-panel>

</x-layout>
