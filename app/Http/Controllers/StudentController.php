<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Phone;

class StudentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = Student::with('phone')->get();
    // dd($student->toArray());
    // $data = Student::get();
    // dd($data->toArray());

    // return "hello students index";
    // return view('student.index',compact('data'));
    return view('student.index')->with(compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // return 'hello success';
    return view('student.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($request->toArray());
    // return "hello students.store";
    $input = $request->except('_token', 'submit');

    $data = new Student;

    $data->name = $input['name'];
    $data->chinese = $input['chinese'];
    $data->english = $input['english'];
    $data->math = $input['math'];

    // $data->name = $request->name;
    // $data->chinese = $request->chinese;
    // $data->english = $request->english;
    // $data->math = $request->math;

    $data->save();
    $id = $data['id'];

    //法一
    // $data = new Phone;
    // $data->phone = $input['phone'];
    // $data->student_id = $id;
    // $data->save();

    //法二
    $phone = new Phone(['phone' => $input['phone']]);

    $student = Student::find($id);

    $student->phone()->save($phone);

    return redirect()->route('students.index');
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
    // return "success $id";
    $data = Student::where('id', $id)->with('phone')->first();
    return view('student.edit')->with(compact('data'));
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
    $data = Student::where('id', $id)->with('phone')->first();
    // dd($data);
    $data->name = $request->name;
    $data->chinese = $request->chinese;
    $data->english = $request->english;
    $data->math = $request->math;
    $data->save();

    $phone = Phone::where('student_id', $id)->first();
    $phone->phone = $request->phone;
    $phone->save();

    return redirect()->route('students.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Student::where('id', $id)->delete();
    Phone::where('student_id', $id)->delete();
    return redirect()->route('students.index');
  }

  public function test123()
  {
    return 'hello success';
  }
}
