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

                    <h1>Results summary</h1>
                    <br>
                    <br>

                    <div>
                        <h2><strong>Directiveness Preferences:</strong></h2>

                        @php
                        $DirectivenessScore = $questionnaire->a1 + $questionnaire->a2 + $questionnaire->a3 + $questionnaire->a4 + $questionnaire->a5;
                        @endphp

                    @if ($DirectivenessScore >= 8 && $DirectivenessScore <= 15)
                        <p>Your responses on this occasion suggest you currently have a strong preference for therapist directiveness.</p>
                    @elseif ($DirectivenessScore >= -2 && $DirectivenessScore <= 7)
                        <p>Your responses on this occasion suggest you currently have no strong preference for who takes the lead in psychotherapy sessions.</p>
                    @elseif ($DirectivenessScore >= -15 && $DirectivenessScore <= -3)
                        <p>Your responses on this occasion suggest you currently have a strong preference for client directiveness.</p>
                    @endif
                </div>
                <h2><strong>Emotional Intensity Preferences:</strong></h2>

                @php
                    $emotionalIntensityScore = $questionnaire->a6 + $questionnaire->a7 + $questionnaire->a8 + $questionnaire->a9;
                @endphp

                @if ($emotionalIntensityScore >= 7 && $emotionalIntensityScore <= 15)
                    <p>Your responses on this occasion suggest you currently have a strong preference for emotional intensity.</p>
                @elseif ($emotionalIntensityScore >= 0 && $emotionalIntensityScore <= 6)
                    <p>Your responses on this occasion suggest you currently have no strong preference regarding the emotional intensity of the therapy.</p>
                @elseif ($emotionalIntensityScore >= -15 && $emotionalIntensityScore <= -1)
                    <p>Your responses on this occasion suggest you currently have a strong preference for emotional reserve.</p>
                @else
                    <p>Your responses on this occasion suggest you currently have no strong preference for emotional intensity in psychotherapy sessions.</p>
                @endif
                <div>

                <div>
                    <h2><strong>Past/Present Orientation Preferences:</strong></h2>

                    @php
                        $pastpresentScore = $questionnaire->a11 + $questionnaire->a12 + $questionnaire->a13;
                    @endphp

                    @if ($pastpresentScore >= 3 && $pastpresentScore <= 9)
                        <p>Your responses on this occasion suggest you currently have a strong preference for past therapy orientation.</p>
                    @elseif ($pastpresentScore >= -2 && $pastpresentScore <= 2)
                        <p>Your responses on this occasion suggest you currently have no strong preference for whether your sessions are past or present oriented..</p>
                    @elseif ($pastpresentScore >= -9 && $pastpresentScore <= -3)
                        <p>Your responses on this occasion suggest you currently have a strong preference for present orientation.</p>
                    @endif
                </div>

                <div>
                    <h2><strong>Challenging/Supportive Preferences:</strong></h2>

                    @php
                        $challengeScore = $questionnaire->a14 + $questionnaire->a15 + $questionnaire->a16 + $questionnaire->a17 + $questionnaire->a18;
                    @endphp

                    @if ($challengeScore >= 4 && $challengeScore <= 15)
                        <p>Your responses on this occasion suggest you currently have a strong preference for warm support.</p>
                    @elseif ($challengeScore >= -3 && $challengeScore <= 3)
                        <p>Your responses on this occasion suggest you currently have no strong preference for whether you prefer your therapy to be warm and supportive or focused and challenging.</p>
                    @elseif ($challengeScore >= -15 && $challengeScore <= -4)
                        <p>Your responses on this occasion suggest you currently have a strong preference for focused challenge.</p>
                    @endif
                </div>

                </div>
                    <h2><strong> Therapist Preferences: </strong></h2>

                    <div>
                        Gender: {{ $questionnaire->gender ?? 'Not specified' }}
                    </div>
                    <div>
                        Language: {{ $questionnaire->language ?? 'Not specified' }}
                    </div>
                    <div>
                        Ethnicity: {{ $questionnaire->ethnicity ?? 'Not specified' }}
                    </div>
                    <div>
                        Religion: {{ $questionnaire->religion ?? 'Not specified' }}
                    </div>
                    <div>
                        Sexual orientation: {{ $questionnaire->sexual_orientation ?? 'Not specified' }}
                    </div>
                    <div>
                        Other personal characteristics: {{ $questionnaire->other_personal_characteristics ?? 'Not specified' }}
                    </div>

                    <h2><strong> Therapy Preferences: </strong></h2>
                    <div>
                        Orientation(s): {{ $questionnaire->orientation ? implode(', ', json_decode($questionnaire->orientation)) : 'Not specified' }}
                    </div>
                    <div>
                        Modalities: {{ $questionnaire->modalities ? implode(', ', json_decode($questionnaire->modalities)) : 'Not specified' }}
                    </div>

                    <h2><strong> Session Preferences: </strong></h2>
                    <div>
                        Duration: {{ $questionnaire->length_of_sessions ?? 'Not specified' }}
                    </div>
                    <div>
                        Frequency: {{ $questionnaire->frequency_of_sessions ?? 'Not specified' }}
                    </div>
                    <div>
                        Total number of sessions: {{ $questionnaire->number_of_sessions ?? 'Not specified' }}
                    </div>

                    <h2><strong> Treatment Preferences: </strong></h2>
                    <div>
                        Type: {{ $questionnaire->medication_preference ?? 'Not specified' }}
                    </div>
                    <div>
                        Additional: {{ $questionnaire->therapy_addition ? implode(', ', json_decode($questionnaire->therapy_addition))  : 'Not specified' }}
                    </div>

                    <h2><strong> You dislike or despise: </strong></h2>
                        <div>
                            {{ $questionnaire->dislikes ?? 'Not specified' }}
                        </div>
                    <h2><strong> Other Preferences: </strong></h2>
                    <div>
                        {{ $questionnaire->strong_preferences ?? 'Not specified' }}
                    </div>
                </div>
                <div class="card">
                    <h3 class="text-2xl font-bold mb-5">Therapists that match your preferences:</h3>

                    <div class="space-y-5">
                        @foreach ($therapists as $therapist)
                            <div class="border border-gray-300 rounded-md p-5 w-full flex shadow">
                                <div class="w-32 pr-5">
                                    <img src="{{ $therapist->photo }}" alt="{{ $therapist->user->name }}">
                                </div>
                                <div class="text-sm">
                                    <h4 class="text-lg font-bold">{{ $therapist->user->name }}</h4>
                                    <div>
                                        <a class="text-link" href="{{ $therapist->user->email }}">{{ $therapist->user->email }}</a>
                                    </div>
                                    <div>
                                        <strong>Age:</strong> {{ \Carbon\Carbon::parse($therapist->dob)->age }}
                                    </div>
                                    <div>
                                        <strong>Gender:</strong> {{ $therapist->gender }}
                                    </div>
                                    <div>
                                        <strong>Matching:</strong> 5 preferences
                                    </div>
                                    {{-- Show more button--}}
                                    <br>
                                    {{-- Only show race, sexual orientation, religion if there is a match. --}}
                                    <div>
                                        <p>Speaks <span style="text-transform: capitalize;">{{ implode(', ', $therapist->language) }}</span>.</p>
                                        <p>Specializes in <span style="text-transform: lowercase;">{{ implode(', ', $therapist->modality) }}</span> therapy modalities.</p>
                                        <p>Demonstrates expertise in <span style="text-transform: lowercase;">{{ implode(', ', $therapist->orientation) }}</span> therapeutic orientation(s).</p>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>