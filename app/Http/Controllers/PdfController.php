<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Controllers\Controller;
use App\Project;
use App\Team;
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
        /*$customPaper = array(0, 0, 792.00, 1300.00);*/
        $users = User::all()->except(1);
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.users',compact('users'));/*->setPaper($customPaper, 'landscape');*/
        return $pdf->download("users-{$date}.pdf");
    }
    public function viewDepartments()
    {
        //$customPaper = array(0, 0, 792.00, 1300.00);
        $departments = Department::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.departments',compact('departments'))/*->setPaper($customPaper, 'landscape')*/;
        return $pdf->stream("departments-{$date}.pdf");
    }
    public function downloadDepartments()
    {
        //$customPaper = array(0, 0, 792.00, 1300.00);
        $departments = Department::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.departments',compact('departments'))/*->setPaper($customPaper, 'landscape')*/;
        return $pdf->download("departments-{$date}.pdf");
    }
    public function viewTeams()
    {
        $teams = Team::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.teams',compact('teams'));
        return $pdf->stream("teams-{$date}.pdf");
    }
    public function downloadTeams()
    {
        $teams = Team::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.teams',compact('teams'));
        return $pdf->download("teams-{$date}.pdf");
    }
    public function viewProjects()
    {
        $projects= Project::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.projects',compact('projects'));
        return $pdf->stream("projects-{$date}.pdf");
    }
    public function downloadProjects ()
    {
        $projects = Project::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.projects',compact('projects'));
        return $pdf->download("projects-{$date}.pdf");
    }
    public function viewTasks($id)
    {
        $tasks = Task::find($id);
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.question',compact('tasks'));
        return $pdf->stream("tasks-{$date}.pdf");
    }
    public function downloadTasks($id)
    {
        $tasks = Task::find($id);
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.tasks',compact('tasks'));
        return $pdf->download("tasks-{$date}.pdf");
    }

    public function viewProjectDetails()
    {
        $projectDetails = Project::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.projectDetails',compact('projectDetails'));
        return $pdf->stream("projectDetails-{$date}.pdf");
    }
    public function downloadProjectDetails()
    {
        $projectDetails = Project::all();
        $date = date('Y-M-d');
        $pdf = PDF::loadView('pdf.projectDetails',compact('projectDetails'));
        return $pdf->download("projectDetails-{$date}.pdf");
    }
}
