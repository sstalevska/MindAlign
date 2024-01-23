<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreQuestionnaireRequest;
use App\Models\Therapist;

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

        $therapists = Therapist::with('user')->get();

        return view('client.questionnaires.index', [
            'questionnaire' => $questionnaire,
            'therapists' => $therapists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('client.questionnaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionnaireRequest $request)
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
