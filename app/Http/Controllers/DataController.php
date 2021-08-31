<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('data', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$student = new Student;
        //$student->nama = $request->nama;
        //$student->jurusan = $request->jurusan;
        //$student->alamat = $request->alamat;

        //$student->save();

        //Student::create([
        //    'nama' =>$request->nama,
        //    'jurusan' =>$request->jurusan,
        //    'alamat' =>$request->alamat,
        //]);

        $request->validate([
            'nama' => 'required',
            'alamat'=> 'required',
            'jurusan' => 'required'
        ]);

        Student::create($request->all());

        return redirect('/data')->with('Status','Data baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return compact('student');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        Student::where('id', $student->id)
                ->update([
                    'nama' =>$request->nama,
                    'jurusan' =>$request->jurusan,
                    'alamat' =>$request->alamat,
                ]);
        return redirect('/data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/data');
    }
}
