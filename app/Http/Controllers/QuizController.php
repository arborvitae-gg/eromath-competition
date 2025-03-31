<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }

    // may change
    public function startQuiz(Request $request)
    {
        $user = $request->user();

        if ($user->quiz) {
            return response()->json(['error' => 'You can only take one quiz.'], 403);
        }

        $quiz = new Quiz();
        $quiz->category = $user->getQuizCategory();
        $quiz->start_time = now();
        $user->quiz()->save($quiz);

        return response()->json($quiz, 201);
    }
}
