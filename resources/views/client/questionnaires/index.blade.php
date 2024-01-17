<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Questionnaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2">
                <div class="card">
                    {{ $questionnaire }}
                    {{ $questionnaire->a3 }}
                </div>
                <div class="card">
                    Therapists
                </div>
            </div>
        </div>
    </div>
</x-app-layout>