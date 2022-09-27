<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vulnerabilities') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 mx-auto container flex flex-wrap justify-around">
        @foreach ($vulnerabilities as $vulnerability)
            <div class="p-8 m-2 bg-white rounded-lg max-w-sm shadow-sm">
                <div class="flex justify-between">
                    <h2 class="inline-block text-lg font-bold mr-2">{{ $vulnerability->title }}</h2>
                    <div class="inline min-w-fit">
                        <x-badge :class="$vulnerability->threat_level === 0
                            ? 'bg-lime-400'
                            : ($vulnerability->threat_level === 1
                                ? 'bg-amber-400'
                                : 'bg-red-400')">
                            Threat: {{ $vulnerability->threat_level }}
                        </x-badge>
                    </div>
                </div>
                <p class="truncate mt-4">{{ $vulnerability->description }}</p>
                <span class="block text-right text-slate-400 mt-1">
                    ~ {{ $vulnerability->user->name }}
                </span>
            </div>
        @endforeach
    </div>
</x-app-layout>
