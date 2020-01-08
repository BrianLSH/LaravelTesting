<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lesson::with(['course.profession'])->get();

        return ['data'=>$data];
    }

    public function search(Request $request)
    {
        $title = $request->all();
        $datamin = '2020-01-07 13:36:44';
//        $datamax = '2020-01-07 14:36:44';
        $datamax = '';
        $name = $title['name'];

//        $data = Lesson::where("lesson_name", "like", "%$name%")
//            ->where(function($q) use($datamin, $datamax){
//                if ($datamin != '') {
//                    $q->where('created_at', '>=', $datamin);
//                }
//
//                if ($datamax != '') {
//                    $q->where('updated_at', '<=', $datamax);
//                }
//            })
//            ->with('course.profession')
//            ->get();

        $data = Lesson::where('lesson_name', 'like', "%$name%")
            ->where(function($q) use($datamin, $datamax){
                
                    if ($datamin != ''){
                        $q->where('created_at', '>=', $datamin);
                    }

                    if ($datamax != '') {
                        $q->where('updated_at', '<=', $datamax);
                    }
            })
            ->with(['course'=>function($q){
                $q->with('profession');
            }])
            ->get();

       return ['data'=>$data];





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
