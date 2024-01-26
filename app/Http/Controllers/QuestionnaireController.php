<?php

namespace App\Http\Controllers;

use App\Models\Therapist;
use Illuminate\View\View;
use App\Models\Questionnaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\QuestionnaireRequest;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        $questionnaire = Questionnaire::where('user_id', auth()->user()->id)->first();
        if (is_null($questionnaire)) {
            return redirect()->route('client.questionnaires.create');
        }

        $query = Therapist::query()->with('user');

        $query->where('gender', $questionnaire->gender);

        $query->orWhere('race', $questionnaire->race);

        $query->orWhere('language' ,$questionnaire->language);

        $query->orWhere('sexual_orientation' ,$questionnaire->sexual_orientation);

        $query->orWhere('religion' ,$questionnaire->religion);

        $therapists = $query->get();
        $therapistsCount = $query->count();

        foreach ($therapists as $therapist){
            $matching = 0;

            if ($questionnaire->gender == $therapist->gender) {
                $matching++;
            }
            if (in_array($questionnaire->race, $therapist->race)) {
                $matching++;
            }
            if ($questionnaire->sexual_orientation == $therapist->sexual_orientation) {
                $matching++;
            }
            if ($questionnaire->religion == $therapist->religion) {
                $matching++;
            }
            if (in_array($questionnaire->language, $therapist->language)) {
                $matching++;
            }
            $therapist->matches = $matching;
        }

        return view('client.questionnaires.index', [
            'questionnaire' => $questionnaire,
            'therapists' => $therapists->sortByDesc('matches'),
            'therapistsCount' => $therapistsCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $questionnaire = new Questionnaire();
        $questionnaire->modality = "[]";
        $questionnaire->orientation = "[]";
         $questionnaire->therapy_addition = "[]";

        return view('client.questionnaires.create-edit', [
            'questionnaire' => $questionnaire,
            'mode' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionnaireRequest $request)
    {
        $req = $request->all();
        $req['modality'] = json_encode($request->modality);
        $req['orientation'] = json_encode($request->orientation);
        $req['therapy_addition'] = json_encode($request->therapy_addition);
        $q = Questionnaire::firstOrCreate(
            ['user_id' => auth()->user()->id],
            $req
        );

        Session::flash('alert_success', 'You have successfully submitted your questionnaire.');

        return redirect(route('client.questionnaires.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire)
    {
        return view('client.questionnaires.create-edit', [
            'questionnaire' => $questionnaire,
            'mode' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->fill($request->all());
        $questionnaire->modality = json_encode($request->modality);
        $questionnaire->orientation = json_encode($request->orientation);
        $questionnaire->therapy_addition = json_encode($request->therapy_addition);
        $questionnaire->save();

        Session::flash('alert_success', 'You have successfully submitted your questionnaire.');

        return redirect(route('client.questionnaires.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
