<x-layout>
    <x-slot name="header">
        {{ __('Home') }}
    </x-slot>

    <x-panel class="flex flex-col items-center pt-16 pb-16">
        <x-application-logo class="block h-12 w-auto" />

        <div class="mt-8 text-2xl">
            Welcome to your Splade application!
        </div>
        <p class="mt-8">
            <Link href="/docs">
                Docs
            </Link>
        </p>
        <p>
            <Link modal href="/docs">
                عرض محتوى الدوكس في مودال
            </Link>
        </p>
        <p>
            <Link slideover href="/docs">
                عرض محتوى الدوكس في سلايد
            </Link>
        </p>
        <p>
            <x-splade-toggle>
                <p v-show="!toggled">Short Content</p>
                {{-- <button @click="toggle">Show  / Hide </button> --}}
                <button v-show="!toggled" @click="setToggle(true)">Show  More </button>
                <button v-show="toggled" @click="setToggle(false)">Show  Less </button>
                <p v-show="toggled">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quam fugit recusandae earum fuga provident, libero consectetur molestiae ducimus, commodi dolor nisi amet quia numquam velit? Quaerat recusandae accusantium nulla?</p>
            </x-splade-toggle>
        </p>
        <p>
            <x-splade-data :default="['show' => true]" remember="content" local-storage>
                <p v-show="!data.show">Short Content</p>
                {{-- <button @click="toggle">Show  / Hide </button> --}}
                <button class="btn btn-danger" v-show="!data.show" @click="data.show = true">Show  More </button>
                <button v-show="data.show" @click="data.show = false">Show  Less </button>
                <p v-show="data.show">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quam fugit recusandae earum fuga provident, libero consectetur molestiae ducimus, commodi dolor nisi amet quia numquam velit? Quaerat recusandae accusantium nulla?</p>
            </x-splade-data>
        </p>
        <hr>
        <hr>
        <hr>

        <p>
            <x-splade-data :default="\App\models\User::first()">
                <p v-text="data.name">

                </p>
            </x-splade-data>
        </p>

    </x-panel>

</x-layout>
