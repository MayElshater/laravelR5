<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Studentcontroller extends Controller
{ 
    private $columns = [
        'studentname',
        'age'
        
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students= DB::table('students')->get();
        return view('students',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('studentForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*
        $student= new Student();
        $student->studentname =$request->input('name');
        $student->age = $request->input('age');
        
        $student->save();
        return 'Inserted';*/
        /*
        Student::create($request->only($this->columns));
        return redirect('students');*/
        $student = DB::table('students')->insertGetId([
            'studentname' => $request->studentname,
            'age' => $request->age]);
        return redirect('students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Retrieve the student record based on the provided ID
       $student = DB::table('students')->where('id', $id)->first();

    // Check if the student is found
      if ($student) {
        // If the student is found, pass it to the view
        return view('showStudent', ['student' => $student]);
    } else {
        // If the student is not found, return an error message or redirect
        return "Student not found";
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = DB::table('students')->where('id', $id)->first();

    // Check if the student is found
      if ($student) {
        // If the student is found, pass it to the view
        return view('editStudent', ['student' => $student]);
    } else {
        // If the student is not found, return an error message or redirect
        return "Student not found";
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $student = DB::table('students')->where('id', $id)->first();

    // Check if the student is found
      if (!$student) {
        // If the student is found, pass it to the view
        return redirect()->back()->with('error', 'Client not found.');
    } else {
        // If the student is not found, return an error message or redirect
        $student = DB::table('students')
        ->where('id', $id)
        ->update([
            'studentname' => $request->studentname,
            'age' => $request->age]);
        return redirect('students')->with('success', 'Client updated successfully.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = DB::table('students')->where('id', $id)->first();

    // If client with given ID is not found, handle the case
    if (!$student) {
        return redirect()->back()->with('error', 'Student not found.');
    }

    // Delete the client
    DB::table('students')->where('id', $id)->delete();

    // Redirect to clients index page with success message
    return redirect('students')->with('success', 'Student deleted successfully.');
    }
}
