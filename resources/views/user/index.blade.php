<x-layout>
    {{-- <x-slot name="header">
        {{ __('Home') }}
    </x-slot> --}}

    <div class="max-w-7xl mx-auto p-8 font-semibold text-xl text-gray-800 leading-tight" >
        <x-splade-table :for="$users" striped>
            @cell('action', $user)
            {{-- <x-splade-cell actions as="$user"> --}}
                <Link href="/user/{{ $user->id }}/edit" class="btn btn-primary">
                     Edit
                </Link>
            {{-- </x-splade-cell> --}}
            @endcell
        </x-splade-table>
    </div>

</x-layout>
