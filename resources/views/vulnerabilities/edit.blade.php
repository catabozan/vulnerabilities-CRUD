<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit: {{ $vulnerability->title }}
        </h2>
    </x-slot>

    <div class="container bg-white rounded-lg mt-8 mx-auto p-8">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('vulnerability.update', ['vulnerability' => $vulnerability->getKey()]) }}" method="POST">
            @method('PATCH')
            @csrf

            <div class="flex justify-between mb-4">
                <div class="inline-block">
                    <x-input-label for="title" value="Title" />
                    <input id="title" type="text" name="title" class="block mt-1"
                        value="{{ old('title') ?? $vulnerability->title }}">
                </div>

                <div>
                    <x-input-label for="threat_level" value="Threat Level" />
                    <select name="threat_level" id="threat_level">
                        <option value="0" @selected(old('threat_level') === 0 || $vulnerability->threat_level === 0)>Low
                            (0)
                        </option>
                        <option value="1" @selected(old('threat_level') === 1 || $vulnerability->threat_level === 1)>
                            Medium (1)
                        </option>
                        <option value="2" @selected(old('threat_level') === 2 || $vulnerability->threat_level === 2)>
                            High (2)
                        </option>
                    </select>
                </div>
            </div>

            <x-input-label for="description" value="Description" />

            <textarea name="description" id="description" cols="70" rows="20">
                {{ old('description') ?? $vulnerability->description }}
            </textarea>

            <button type="submit" class="bg-sky-400 py-2 px-4 rounded mt-12 block">Save</button>
        </form>
    </div>
</x-app-layout>
