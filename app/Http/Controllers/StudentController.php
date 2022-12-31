<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.add');
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
        //dd($request);
        $rules = [
            'name' => 'required',
            'subject' => 'required',
            'mark' => 'required'
        ];
        
        $this->validate($request, $rules);
        //dd($request);
        // Student::firstOrCreate([
        //     'name' => $request->name,
        //     'subject' => $request->subject,
        // ]);
        $student = Student::where(['name' => $request->name,'subject' => $request->subject,])->count();
        if($student > 0)
        {
            Student::updateOrCreate(
                ['name' => $request->name,'subject' => $request->subject],
                ['mark' => \DB::raw("mark + $request->mark")]

            );
        }
        else
        {
            Student::updateOrCreate(
                ['name' => $request->name,'subject' => $request->subject,'mark' => $request->mark]
            );
        }
        

        return redirect()->route('home')->with('status', 'Student Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Student::where('id', $id)
        ->update(['name' => $request->name,'subject' => $request->subject,'mark' => $request->mark]);
        return redirect()->route('home')->with('status', 'Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('home')->with('status', 'Student Deleted Successfully');
    }
}
