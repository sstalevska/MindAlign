<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Questionnaire') }}
            </h2>
            <div class="ml-auto">
                <x-primary-link :href="route('client.questionnaires.edit', ['questionnaire' => $questionnaire])">Retake Questionnaire</x-primary-link>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2">
                <div class="card">
                    <h3 class="text-2xl font-bold mb-5">Results summary</h3>

                    <h4 class="text-lg font-bold"><strong>Directiveness Preferences:</strong></h4>
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

                    <h4 class="pt-5 text-lg font-bold"><strong>Emotional Intensity Preferences:</strong></h4>

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

                    <h4 class="pt-5 text-lg font-bold"><strong>Past/Present Orientation Preferences:</strong></h4>

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

                    <h4 class="pt-5 text-lg font-bold"><strong>Challenging/Supportive Preferences:</strong></h4>

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

                    <hr class="my-5">

                    <h4 class="text-lg font-bold"><strong> Therapist Preferences: </strong></h4>

                    <div>
                        Gender: {{ $questionnaire->gender ?? 'Not specified' }}
                    </div>
                    <div>
                        Language: {{ $questionnaire->language ?? 'Not specified' }}
                    </div>
                    <div>
                        Ethnicity: {{ $questionnaire->race ?? 'Not specified' }}
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

                    <hr class="my-5">

                    <h4 class="text-lg font-bold"><strong> Therapy Preferences: </strong></h4>
                    <div>
                        Orientation(s): {{ $questionnaire->orientation ? implode(', ', json_decode($questionnaire->orientation)) : 'Not specified' }}
                    </div>
                    <div>
                        Modalities: {{ $questionnaire->modalities ? implode(', ', json_decode($questionnaire->modalities)) : 'Not specified' }}
                    </div>

                    <hr class="my-5">

                    <h4 class="text-lg font-bold"><strong> Session Preferences: </strong></h4>
                    <div>
                        Duration: {{ $questionnaire->length_of_sessions ?? 'Not specified' }}
                    </div>
                    <div>
                        Frequency: {{ $questionnaire->frequency_of_sessions ?? 'Not specified' }}
                    </div>
                    <div>
                        Total number of sessions: {{ $questionnaire->number_of_sessions ?? 'Not specified' }}
                    </div>

                    <hr class="my-5">

                    <h4 class="text-lg font-bold"><strong> Treatment Preferences: </strong></h4>
                    <div>
                        Type: {{ $questionnaire->medication_preference ?? 'Not specified' }}
                    </div>
                    <div>
                        Additional: {{ $questionnaire->therapy_addition ? implode(', ', json_decode($questionnaire->therapy_addition))  : 'Not specified' }}
                    </div>

                    <hr class="my-5">

                    <h4 class="text-lg font-bold"><strong> You dislike or despise: </strong></h4>
                        <div>
                            {{ $questionnaire->dislikes ?? 'Not specified' }}
                        </div>
                        <hr class="my-5">
                    <h4 class="text-lg font-bold"><strong> Other Preferences: </strong></h4>
                    <div>
                        {{ $questionnaire->strong_preferences ?? 'Not specified' }}
                    </div>
                </div>

                <div class="card">
                    <h3 class="text-2xl font-bold mb-5">{{ $therapistsCount }} {{ Str::plural('Therapist', $therapistsCount) }}  match your preferences:</h3>

                    <div class="space-y-5">
                        @php
                            function implodeHighlight(string $separator, array $niza, string $match) {
                                $result = '';
                                $counter = 0;
                                foreach ($niza as $key => $value) {
                                    if ($value === $match){
                                        $result .= '<span class="px-1 bg-blue-200">'.$value.'</span>';
                                    } else {
                                        $result .= $value;
                                    }
                                    if ((count($niza) - 1) !== $counter) {
                                        $result .= $separator;
                                    }
                                    $counter++;
                                }

                                return $result;
                            }
                        @endphp
                        @foreach ($therapists as $therapist)
                            @php
                                $raceMatch = false;
                                $languageMatch = false;
                                $genderMatch = false;
                                $sexualOrientationMatch = false;
                                $religionMatch = false;

                                if ($questionnaire->gender == $therapist->gender) {
                                    $genderMatch = true;
                                }
                                if (in_array($questionnaire->race, $therapist->race)) {
                                    $raceMatch= true;
                                }
                                if ($questionnaire->sexual_orientation == $therapist->sexual_orientation) {
                                    $sexualOrientationMatch = true;
                                }
                                if ($questionnaire->religion == $therapist->religion) {
                                    $religionMatch =true;
                                }
                                if (in_array($questionnaire->language, $therapist->language)) {
                                    $languageMatch =true;
                                }
                            @endphp
                            <div x-data="{ open: false }" class="border border-gray-300 rounded-md p-5 shadow text-sm">
                                <div class="w-full flex">
                                    <div class="flex-grow">
                                        <h4 class="text-lg font-bold">{{ $therapist->user->name }}</h4>
                                        <div>
                                            <a class="text-link" href="mailto:{{ $therapist->user->email }}">{{ $therapist->user->email }}</a>
                                        </div>
                                        <div>
                                            <strong>Age:</strong> {{ \Carbon\Carbon::parse($therapist->dob)->age }}
                                        </div>
                                        <div>
                                            <strong>Gender:</strong>
                                            @if ($genderMatch)
                                                <span class="px-1 bg-blue-200">{{ $therapist->gender }}</span>
                                            @else
                                                {{ $therapist->gender }}
                                            @endif
                                        </div>
                                        <div>
                                            <strong>Matching:</strong> {{ $therapist->matches }} preferences
                                        </div>
                                        {{-- Show more button--}}
                                        <x-secondary-button @click="open = ! open" class="mt-5 !px-2 !py-1">Show more</x-secondary-button>
                                    </div>
                                    <div class="w-32 pl-5 flex-shrink-0">
                                        <img class="rounded" src="{{ $therapist->photo }}" alt="{{ $therapist->user->name }}">
                                    </div>
                                </div>

                                <div xcloak x-show="open" class="pt-5">
                                    {{-- Only show race, sexual orientation, religion if there is a match. --}}
                                    <div>
                                        @if ($raceMatch)
                                            <p>Matches your ethnicity preference by being {!! implodeHighlight(', ', $therapist->race, $questionnaire->race) !!}.</p>
                                        @endif
                                        @if ($sexualOrientationMatch)
                                            <p>Matches your sexual orientation preference by being <span class="px-1 bg-blue-200">{{ $therapist->sexual_orientation }}</span>.</p>
                                        @endif
                                        @if ($religionMatch)
                                            <p>Matches your religion preference <span class="px-1 bg-blue-200">{{ $therapist->religion }}</span>.</p>
                                        @endif

                                        <p>Speaks <span style="text-transform: capitalize;">{!! implodeHighlight(', ', $therapist->language, $questionnaire->language) !!}</span>.</p>
                                        <p>Specializes in <span style="text-transform: lowercase;">{{ implode(', ', $therapist->modality) }}</span> therapy modalities.</p>
                                        <p>Demonstrates expertise in <span style="text-transform: lowercase;">{{ implode(', ', $therapist->orientation) }}</span> therapeutic orientation(s).</p>
                                    </div>
                                    <div>
                                        <br>
                                        <strong>Biography</strong><br>
                                        {{ $therapist->bio }}
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