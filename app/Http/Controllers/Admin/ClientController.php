<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Client;
use File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')->orderBy('created_at', 'desc')->paginate();
        return view('admin.clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = null;
        $act = "Add";
        return view('admin.clients.create', compact('client', 'act'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $this->validate($request,[
            'name' => 'required|string',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:clients,email,id',
            'response' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'training_name' => 'required|string',
            'duration' => 'required|integer',
            'description' => 'required|string',
            'profile_image' => 'required|image',
        ]);

        $profile_image = $request->file('profile_image');
        if ($profile_image) {
            $path = public_path() . "/uploads/clients";
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true); //arguments=>directory,permission,recursive_call,ownership
            }
            $file_name = "Client-" . time() . "." . $profile_image->getClientOriginalExtension();
            $success = $profile_image->move($path, $file_name);
            if ($success) {
                $client->profile_image = $file_name;
            }
        }
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->description = $request->description;
        $client->training_name = $request->training_name;
        $client->response = $request->response;
        $client->duration = $request->duration;
        $client->address = $request->address;
        $client->save();
        if ($client) {
            return redirect(route('admin.client.index'))->with('message', 'Client Added Successfully');
        } else {
            return back()->with('message', 'Error occured while inserting Client');
        }
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
        $act = "Update";
        $client = Client::find($id);
        return view('admin.clients.create', compact('client', 'act'));
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

         $this->validate($request,[
            'name' => 'required|string',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:clients,email,'.$id.',id',
            'response' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'training_name' => 'required|string',
            'duration' => 'required|integer',
            'description' => 'required|string',
            'profile_image' => 'required|image',
        ]);

        $client = Client::find($id);
       
        $profile_image = $request->file('profile_image');
        if ($profile_image) {
            $path = public_path() . "/uploads/clients";
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true); //arguments=>directory,permission,recursive_call,ownership
            }
            $file_name = "Client-" . time() . "." . $profile_image->getClientOriginalExtension();
            $success = $profile_image->move($path, $file_name);

            if ($success) {
                if (isset($client->profile_image) && !empty($client->profile_image) && file_exists(public_path() . '/uploads/clients/' . $client->profile_image)) {
                    unlink(public_path() . '/uploads/clients/' . $client->profile_image);
                }
                $client->profile_image = $file_name;
            }
        }
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->description = $request->description;
        $client->training_name = $request->training_name;
        $client->response = $request->response;
        $client->duration = $request->duration;
        $client->address = $request->address;
        $client->save();
        if ($client) {
            return redirect(route('admin.client.index'))->with('message', 'Client Added Successfully');
        } else {
            return back()->with('message', 'Error occured while inserting Client');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return redirect(route('admin.client.index'))->with('message', 'The client you are trying to delete is not exist');
        }
        $image = $client->profile_image;
        $success = Client::destroy($id);
        if ($success) {
            if (public_path() . '/uploads/clients/' . $image) {
                unlink(public_path() . '/uploads/clients/' . $image);
            }
            return redirect(route('admin.client.index'))->with('message', 'Client Deleted Successfully');
        } else {
            return redirect(route('admin.client.index'))->with('message', 'Error occured while deleting Client');
        }
    }

    public function trash()
    {
        // dd($id);
        // $categories = Category::onlyTrashed()->paginate(5);
        // return view('admin.categories.index', compact('categories'));
    }
}
