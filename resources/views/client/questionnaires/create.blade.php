<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Questionnaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('client.questionnaires.store') }}" method="POST" class="mt-6 space-y-6">
                @csrf

                <div class="card">
                    <p class="mb-20">I would like the therapist to...</p>

                    <x-radio-row required="required" slug="a1" label1="Focus on specific goals" label2="No or equal preference" label3="Not focus on specific goals" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a2" label1="Give structure to the therapy" label2="No or equal preference" label3="Allow the therapy to be unstructured" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a3" label1="Teach me skills to deal with my problems" label2="No or equal preference" label3="Not teach me skills to deal with my problems" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a4" label1="Give me 'homework' to do" label2="No or equal preference" label3="Not give me 'homework' to do" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a5" label1="Take a lead in therapy" label2="No or equal preference" label3="Allow me to take a lead in therapy" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a6" label1="Encourage me to go into difficult emotions" label2="No or equal preference" label3="Not encourage me to go into difficult emotions" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a7" label1="Talk with me about the therapy relationship" label2="No or equal preference" label3="Not talk with me about the therapy relationship" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a8" label1="Focus on the relationship between us" label2="No or equal preference" label3="Not focus on the relationship between us" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a9" label1="Encourage me to express strong feelings" label2="No or equal preference" label3="Not encourage me to express strong feelings" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a10" label1="Focus mainly on my feelings" label2="No or equal preference" label3="Focus mainly on my thoughts" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a11" label1="Focus on my life in the past" label2="No or equal preference" label3="Focus on my life in the present" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a12" label1="Help me reflect on my childhood" label2="No or equal preference" label3="Help me reflect on my adulthood" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a13" label1="Focus on my past" label2="No or equal preference" label3="Focus on my future" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a14" label1="Be gentle" label2="No or equal preference" label3="Be challenging" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a15" label1="Be supportive" label2="No or equal preference" label3="Be confrontational" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a16" label1="Not interrupt me" label2="No or equal preference" label3="Interrupt me and keep me focused" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a17" label1="Not be challenging of my own beliefs and views" label2="No or equal preference" label3="Be challenging of my own beliefs and views" />
                    <hr class="my-10 border-t-2">
                    <x-radio-row required="required" slug="a18" label1="Support my behaviour unconditionally" label2="No or equal preference" label3="Challenge my behaviour if they think it's wrong" />
                </div>

                <div class="card">
                    <p class="mb-5">I would prefer if my psychotherapist were...</p>

                    <x-radio-stacked :set="config('form-options.gender')" name="gender" />
                    <hr class="my-10 border-t-2">
                    <p class="mb-5">I would prefer if my psychotherapist were...</p>
                    <x-radio-stacked :set="config('form-options.race')" name="race" />
                    <hr class="my-10 border-t-2">
                    <p class="mb-5">I would prefer if my psychotherapist were...</p>
                    <x-radio-stacked :set="config('form-options.sexual_orientation')" name="sexual_orientation" />
                    <hr class="my-10 border-t-2">
                    <p class="mb-5">I would prefer if my psychotherapist were...</p>
                    <x-radio-stacked :set="config('form-options.religion')" name="religion" />
                    <hr class="my-10 border-t-2">

                    <p class="mb-5">Are there any other personal characteristics you would prefer for your therapist?</p>
                    <textarea name="other_personal_characteristics" rows="5" class="w-full"></textarea>
                    <hr class="my-10 border-t-2">

                    <p class="mb-5">I would prefer it if my psychotherapist or counsellor could speak:</p>
                    <x-radio-stacked :set="config('form-options.language')" name="language" />
                    <hr class="my-10 border-t-2">

                    <p class="mb-5">I would prefer the following modalities of psychotherapy:</p>
                    <x-checkbox-stacked :set="config('form-options.modality')" name="modality" />
                    <hr class="my-10 border-t-2">
                    <p class="mb-5">I would prefer the following type(s) of psychotherapy:</p>
                    <x-checkbox-stacked :set="config('form-options.orientation')" name="orientation" />
                    <hr class="my-10 border-t-2">


                    <p class="mb-5">How many sessions of psychotherapy would you prefer?</p>
                    <x-radio-stacked :set="config('form-options.number_of_sessions')" name="number_of_sessions" />
                    <hr class="my-10 border-t-2">
                    <p class="mb-5">How long would you prefer your psychotherapy sessions to last?</p>
                    <x-radio-stacked :set="config('form-options.length_of_sessions')" name="length_of_sessions" />
                    <hr class="my-10 border-t-2">
                    <p class="mb-5">How frequent would you like your therapy sessions to be?</p>
                    <x-radio-stacked :set="config('form-options.frequency_of_sessions')" name="frequency_of_sessions" />
                    <hr class="my-10 border-t-2">
                    <p class="mb-5">I have a preference for:</p>
                    <x-radio-stacked :set="config('form-options.medication_preference')" name="medication_preference" />
                    <hr class="my-10 border-t-2">
                    <p class="mb-5">In addition to therapy, I have a preference for:</p>
                    <x-checkbox-stacked :set="config('form-options.therapy_addition')" name="therapy_addition" />
                    <hr class="my-10 border-t-2">



                    <p class="mb-5">Please provide any other details about strong preferences you have regarding your psychotherapy? (And do raise them at any point in therapy.)</p>
                    <textarea name="strong_preferences" rows="5" class="w-full"></textarea>
                    <hr class="my-10 border-t-2">

                    <p class="mb-5">What would you most dislike or despise happening in your psychotherapy or counselling? </p>
                    <textarea name="dislikes" rows="5" class="w-full"></textarea>

                </div>

                <div class="mt-20">
                    <x-primary-button>Submit</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>