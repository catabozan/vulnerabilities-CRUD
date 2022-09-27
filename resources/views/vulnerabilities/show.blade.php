<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $vulnerability->title }}
        </h2>
    </x-slot>

    <div class="container bg-white rounded-lg mt-8 mx-auto p-8">
        <div class="flex justify-between">
            <span class="text-slate-400">
                Submitted by: {{ $vulnerability->user->name }} | {{ $vulnerability->created_at->diffForHumans() }}
            </span>
            <div class="inline min-w-fit">
                <x-badge :class="$vulnerability->threat_level === 0
                    ? 'bg-lime-400'
                    : ($vulnerability->threat_level === 1
                        ? 'bg-amber-400'
                        : 'bg-red-400')">
                    Threat level: {{ $vulnerability->threat_level }}
                </x-badge>
            </div>
        </div>
        <h2 class="font-semibold text-xl text-gray-800 mt-4">Description</h2>
        <p> {{ $vulnerability->description }} </p>

        @auth
            @if (Auth::user()->is($vulnerability->user))
                <div class="mt-12">
                    <form action="{{ route('vulnerability.destroy', ['vulnerability' => $vulnerability->getKey()]) }}"
                        method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="bg-red-400 py-2 px-4 rounded">Delete</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
</x-app-layout>
