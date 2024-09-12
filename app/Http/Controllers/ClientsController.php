<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Events\Clientdeleted;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::paginate(50);
        return view('clients.clientslist', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('manage_clients');
        if (Gate::allows('manage_clients', Auth()->user())) {
            return view('clients.create-clients');
        } else {
            $msg = $response->message();
            return view('alerts.no-rights', compact('msg'));
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Clients::find($id);
        return view('clients.client', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Clients::find($id);
        if (Auth()->user()->cannot('edit', $client)) {
            $msg = 'Your Have no rights to access this page';
            return view('alerts.no-rights', compact('msg'));
        } else {

            return view('clients.edit-client', compact('client'));
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $client)
    {
        try {
            event(new Clientdeleted($client));
            $client->delete();
        } catch (\Exception $e) {

            // return $e->getMessage();
            return redirect()->back()->with(
                'error',
                ' Cannot delete Client Because  is Assigned to a Project'
            );
        }
        return redirect('/clients')->with('success', 'Client Deleted');
    }
}
