<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use PDF;

class PdfController extends Controller
{
    public function viewUsers()
    {
        //$customPaper = array(0, 0, 792.00, 1300.00);
        $users = User::all()->except(1);
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.users',compact('users'));/*->setPaper($customPaper, 'landscape');*/
        return $pdf->stream("users-{$date}.pdf");
    }
    public function downloadUsers()
    {
        //$customPaper = array(0, 0, 792.00, 1300.00);
        $users = User::all()->except(1);
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.users',compact('users'));/*->setPaper($customPaper, 'landscape');*/
        return $pdf->download("users-{$date}.pdf");
    }
    public function viewBlockedStudents()
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $students = Student::onlyTrashed()->get();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.students',compact('students'))->setPaper($customPaper, 'landscape');
        return $pdf->stream("students-{$date}.pdf");
    }
    public function downloadBlockedStudents()
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $students = Student::onlyTrashed()->get();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.students',compact('students'))->setPaper($customPaper, 'landscape');
        return $pdf->download("students-{$date}.pdf");
    }
    public function viewdepartment()
    {
        $departments = Department::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.department',compact('departments'));
        return $pdf->stream("departments-{$date}.pdf");
    }
    public function downloaddepartment()
    {
        $departments = Department::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.department',compact('departments'));
        return $pdf->download("departments-{$date}.pdf");
    }
    public function viewSubject()
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $subjects = Subject::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.subject',compact('subjects'));
        return $pdf->stream("subjects-{$date}.pdf");
    }
    public function downloadSubject()
    {
        $subjects = Subject::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.subject',compact('subjects'));
        return $pdf->download("subjects-{$date}.pdf");
    }
    public function viewQuestion($id)
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $subject = Subject::find($id);
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.question',compact('subject'))->setPaper($customPaper, 'landscape');
        return $pdf->stream("{$subject->name}-questions-{$date}.pdf");
    }
    public function downloadQuestion($id)
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $subject = Subject::find($id);
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.question',compact('subject'))->setPaper($customPaper, 'landscape');
        return $pdf->download("{$subject->name}-questions-{$date}.pdf");
    }
    public function viewTest()
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $tests = Test::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.tests',compact('tests'));
        return $pdf->stream("tests-{$date}.pdf");
    }
    public function downloadTest()
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $tests = Test::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.tests',compact('tests'));
        return $pdf->download("tests-{$date}.pdf");
    }
    public function viewRank()
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $tests = Test::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.tests',compact('tests'));
        return $pdf->stream("tests-{$date}.pdf");
    }
    public function downloadRank()
    {
        $customPaper = array(0, 0, 792.00, 1300.00);
        $tests = Test::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.tests',compact('tests'));
        return $pdf->download("tests-{$date}.pdf");
    }
}
