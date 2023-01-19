<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\rollIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CoursesController extends Controller
{
    public function index($id)
    {
        $courses = Courses::find($id);
        $userID = auth()->id();

        $userCourses = rollIn::where('user_id',$userID)->where('course_id',$id)->first();
//        dd(empty($userCourses));
        return view('course-details',['courses'=>$courses,'isRolled'=>!empty($userCourses)]);
    }
    public function rollIn($id)
    {
        $courses = Courses::find($id);
        $userID = auth()->id();
        $rollIn = new rollIn();
        $rollIn->user_id=$userID;
        $rollIn->course_id=$id;
        $rollIn->save();
        return Redirect::back()->with('massage','Operation Successful');
    }
    //
}
