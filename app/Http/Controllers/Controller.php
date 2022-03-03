<?php

namespace App\Http\Controllers;

use App\Models\Occupants;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $page = 'occupants';
        $occupants = Occupants::all();
        $occupant_count = count($occupants);
        return view('occupants')->with([
            'page' => $page,
            'occupants' => $occupants,
            'occupant_count' => $occupant_count
        ]);
    }

    public function data_collection(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $page = 'data';
        return view('data_collection')->with([
           'page' => $page
        ]);
    }

    public function add_occupant(Request $request) {
//        dd($request);
        $request->validate([
            'image' => ['required', 'mimes:jpg,png,jpeg,gif', 'max:5048'],
            'first_name' => ['required', 'string'],
            'other_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'contact' => ['required', 'numeric'],
            'program' => ['required', 'string'],
            'level' => ['required', 'string'],
            'index_number' => ['required', 'string', 'unique:occupants'],
            'room_number' => ['required', 'string'],
        ]);

        $occupant_image = time() . '_' . $request->last_name . '.' . $request->image->extension();
        $request->image->move(public_path('occupants_image'), $occupant_image);

        Occupants::create([
            'first_name' => $request->first_name,
            'other_name' => $request->other_name,
            'last_name' => $request->last_name,
            'contact' => $request->contact,
            'program' => $request->program,
            'level' => $request->level,
            'index_number' => $request->index_number,
            'room_number' => $request->room_number,
            'image' => $occupant_image
        ]);

        return back()->with('success', 'Occupant added successfully');
    }

//    Search can be done by room number, index number or last name
    public function search(Request $request){
//        dd($request);
        $query = $request->search_query;
        $page = 'occupants';
        $occupants = Occupants::where('last_name', 'LIKE', '%' . $query . '%')
            ->orWhere('room_number', 'LIKE', '%' . $query . '%')
            ->orWhere('index_number', 'LIKE', '%' . $query . '%')
            ->get();
        $occupant_count = count($occupants);

        return view('occupants')->with([
            'page' => $page,
            'occupants' => $occupants,
            'occupant_count' => $occupant_count,
            'search' => '1'
        ]);
    }
}
