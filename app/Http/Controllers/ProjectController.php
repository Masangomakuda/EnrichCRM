<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clients;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Events\ProjectAssigned;
use App\Events\ProjectAssignedEvent;
use App\Http\Requests\projectformrequest;
use App\Http\Requests\ProjectupdateformRequest;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with(['user','client'])->paginate(10);
        return view('projects.projects-list',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $project = Project::with('user','client');
        $users = User::where('is_admin',1)->get();
        $clients = Clients::all();
        return view('projects.create-project',compact('clients','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(projectformrequest $request,User $user ,Project $project)
    {
        $user = User::find($request->user_id);
        $project = project::create($request->validated());
        event(new ProjectAssignedEvent($user,$project));
        
        
        return redirect('/projects')->with('success','Project created successfully');


        
     
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
          $project = Project::find($id);
          $project->with('user', 'client');
    
        return view('projects.project',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::with('user','client')->find($id);
        $users = User::where('is_admin',1)->get();
        $clients = Clients::get();
        // $selecteduser = Project::where('id',$id)
        //                         ->where('user_id',$project->user->id)
        //                         ->get();
        // dd($selecteduser);
        return view('projects.edit-project',compact('project','users','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectupdateformRequest $request, Project $project)
    {
        // dd($request);
        $project->update($request->validated());
        return redirect('/projects')->with('success','Project Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/projects')->with('success','Project deleted successfully');

    }

    // Shows All deleted projects
    public function deleted_projects(Project $project)
    {
       $projects = Project::onlyTrashed()->paginate(50);
       return view('projects.deleted-projects',compact('projects'));
    }

    public function restore_project($id){

        $project = Project::withTrashed()->find($id);
        $project->restore();       
        return redirect()->route('projects.show',[ $project->id ])->with('success','Project Restored Successfully');
    }

    public function remove_project($id){

        $project = Project::onlyTrashed()->find($id);
        $project->forceDelete();
        return redirect()->route('projects-deleted')->with('success','Project Permanently Removed');
       
        
    }
}
