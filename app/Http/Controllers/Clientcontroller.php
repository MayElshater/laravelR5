<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Client;
class Clientcontroller extends Controller
{
    private $columns =['clientname',
    'phone',
    'email',
    'website'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients= Client::get();
        return view('clients',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clientForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*
        $client= new Client();
        $client->clientname =$request->input('name');
        $client->phone = $request->input('phone');
        $client->email = $request->input('email');
        $client->website = $request->input('website');
        $client->save();*/
        Client::create($request->only($this->columns));
        return redirect('clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $client = Client::find($id);

    // Return the edit view with the client data
         return view('showClient', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id )
    {
        // Fetch the client with the given ID
         $client = Client::find($id);

    // Return the edit view with the client data
         return view('editClient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $client = Client::find($id);
    
        if (!$client) {
        // Handle case where client with given ID is not found
        // For example, redirect back with an error message
              return redirect()->back()->with('error', 'Client not found.');
        }
         
         // Update client attributes
        $client->update($request->only($this->columns));

        // Redirect to clients index page or any other desired destination
        return redirect('clients')->with('success', 'Client updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
{
    // Find the client by ID
    $id=$request->id;
    $client = Client::find($id);

    // If client with given ID is not found, handle the case
    if (!$client) {
        return redirect()->back()->with('error', 'Client not found.');
    }

    // Delete the client
    $client->delete();

    // Redirect to clients index page with success message
    return redirect('clients')->with('success', 'Client deleted successfully.');
}

}
