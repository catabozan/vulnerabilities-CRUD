<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $vulnerability->title }}
        </h2>
    </x-slot>

    <div class="container bg-white rounded-lg mt-8 mx-auto p-8">
        <span class="text-slate-400">Submitted by: {{ $vulnerability->user->name }}</span>
        <h2 class="font-semibold text-xl text-gray-800 mt-4">Description</h2>
        <p> {{ $vulnerability->description }} </p>
    </div>
</x-app-layout>
