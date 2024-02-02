<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (auth()->user()->role === 'admin')
                <x-pulse full-width>
                    <livewire:pulse.usage type="requests" />
                    <livewire:pulse.usage type="slow_requests" />
                    <livewire:pulse.slow-requests />
                    <livewire:pulse.exceptions />
                    <livewire:pulse.slow-queries />
                    <livewire:4xx />
                </x-pulse>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 space-y-5">
                        <h1>Welcome</h1>
                        <p>Take the questionnaire to get contact information of therapists that match your personal needs and preferences.</p>
                        <p>
                            This questionnaire is designed in accordance with the Cooper-Norcross Inventory of Preferences (C-NIP) - a brief, multidimensional measure of clients' therapy preferences.
                        </p>

                        <p>
                            <x-primary-link :href="route('client.questionnaires.index')">Take Questionnaire</x-primary-link>
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
