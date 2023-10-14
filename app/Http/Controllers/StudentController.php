<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function list() {
        return Student::all();
    }

    public function getStudent($id) {
        $student = Student::find($id);

        if($student == null){
            return response() -> json('Student not found', 404);
        }
            
        return $student;       
    }

    //function to create a student
    public function create(Request $request){
        //$student = new Student;
        //$student -> first_name = $request-> first_name;
        //$student -> last_name = $request-> last_name;
        //$student -> save();

        $student = Student::create($request->all());
        return $request->all();
    }

    public function updateStudent(Request $request, $id) {
        $student = Student::find($id);

        if($student == null){
            return response() -> json('Student not found', 404);
        }

        $student-> fill($request->all())->save();

        return $student;
    }

    //function to delete a student
    public function deleteStudent($id) {
        $student = Student::find($id);

        if($student == null){
            return response() -> json('Student not found', 404);
        }

        $student-> delete();

        return $student;
    }
            
       

}
