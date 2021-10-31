<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback\Feedback;
use App\Models\FeedbackLanguage\FeedbackLanguage;
use DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = Feedback::with('languages')->get();

        return view('feedback.index', compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Start transaction!
        DB::beginTransaction();
        try{
            //Saving logic here
            Feedback::create($request->all());

        } catch(\Exception $e) {
            //Failed logic here
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('feedback.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::with('languages')->find($id);

        $languages = $feedback->languages->pluck('language_id')->toArray();

        return view('feedback.edit', compact(['feedback', 'languages']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Start transaction!
        DB::beginTransaction();
        try{
            //Saving logic here
            $feedback = Feedback::with('languages')->find($id);
            $feedback->name = $request->name;
            $feedback->age = $request->age;
            $feedback->gender = $request->gender;
            $feedback->willing_to_work = $request->willing_to_work;
            $feedback->save();
        } catch(\Exception $e) {
            //Failed logic here
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('feedback.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Start transaction!
        DB::beginTransaction();
        try{
            //Saving logic here
            Feedback::destroy($id);

        } catch(\Exception $e) {
            //Failed logic here
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('feedback.index');
    }
}
