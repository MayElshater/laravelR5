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
        $data = $request->validate([
            'clientname' => 'required|min:3|max:100',
            'phone' => 'required|max:13',
            'email'=>'required|email:rfc',
            'website'=>'required'
        ]);
        Client::create($data);
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
    /*
    public function update(Request $request, string $id)
    {
        //
        $client = Client::find($id);
        $data = $request->validate([
            'clientname' => 'required|min:3|max:100',
            'phone' => 'required|max:13',
            'email'=>'required|email:rfc',
            'website'=>'required'
        ]);
    
        if (!$client) {
        // Handle case where client with given ID is not found
        // For example, redirect back with an error message
              return redirect()->back()->with('error', 'Client not found.');
        }
         
         // Update client attributes
        $client->update($request->only($this->data));

        // Redirect to clients index page or any other desired destination
        return redirect('clients')->with('success', 'Client updated successfully.');

    }*/
    public function update(Request $request, string $id)
{
    // Validate the request data
    $data = $request->validate([
        'clientname' => 'required|min:3|max:100',
        'phone' => 'required|max:13|min:11',
        'email' => 'required|email:rfc',
        'website' => 'required'
    ]);

    // Find the client by ID using Eloquent ORM
    $client = Client::find($id);

    // Check if the client exists
    if (!$client) {
        // Handle case where client with given ID is not found
        return redirect()->back()->with('error', 'Client not found.');
    }

    // Update the client attributes
    $client->update($data);

    // Redirect to clients index page with success message
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
public function trash()
{
    // Find the client by ID
    
    $trashed = Client::onlyTrashed()->get();

    

    // Redirect to clients index page with success message
    return view('trashClient',compact('trashed'));
}
public function restore(string $id){
    Client::where('id',$id)->restore();
    return redirect('clients');
}
public function force(Request $request)
{
    // Find the student by ID
    $id = $request->id;

    // Permanently delete the student using query builder
    DB::table('students')->where('id', $id)->delete();

    // Redirect to trash students page with success message
    return redirect('trashStudent')->with('success', 'Student deleted permanently.');
}
}
