<?php

namespace App\Http\Controllers;

use App\Models\LearningActivity;
use App\Models\Metode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LearningActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = LearningActivity::with('metode')->get();
        $metodes = Metode::all();

        $groupedActivities = [];

        foreach ($metodes as $metode) {
            foreach (['01', '02', '03', '04', '05', '06'] as $month) {
                $groupedActivities[$metode->id]['2024-' . $month] = [];
            }
        }


        foreach ($activities as $activity) {
            $month = Carbon::parse($activity->start_date)->format('Y-m');
            if (isset($groupedActivities[$activity->metode_id][$month])) {
                $groupedActivities[$activity->metode_id][$month][] = $activity;
            }
        }

        return view('learning_activities.index', compact('metodes', 'groupedActivities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    //     $metodes = Metode::all();
    //     return view('learning_activities.create', compact('metodes'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'metode_id' => 'required',
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        LearningActivity::create($request->all());
        return redirect()->route('learning-activity.index')
            ->with('success', 'Learning Activity Berhasil Ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LearningActivity $learningActivity)
    {
        //
        $methods = Metode::all();
        return view('learning_activities.show', compact('learningActivity', 'methods'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(LearningActivity $learningActivity)
    // {
    //     //
    //     $methods = Metode::all();
    //     return view('learning_activities.edit', compact('learningActivity', 'methods'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LearningActivity $learningActivity)
    {
        //
        $request->validate([
            'metode_id' => 'required',
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $learningActivity->update($request->all());

        return redirect()->route('learning-activity.index')
            ->with('success', 'Learning Activity Berhasil Diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LearningActivity $learningActivity)
    {
        $learningActivity->delete();
        return redirect()->route('learning-activity.index')
            ->with('danger', 'Learning Activity Berhasil Dihapus.');
    }
}
