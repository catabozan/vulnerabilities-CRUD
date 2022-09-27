<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Vulnerabilities') }}
        </h2>
        @auth
            <a href="{{ route('vulnerability.create') }}" class="ml-4 rounded bg-sky-400 py-2 px-4 text-black">
                + Create New
            </a>
        @endauth
    </x-slot>

    <x-vulnerability-list :vulnerabilities="$vulnerabilities" />
</x-app-layout>
