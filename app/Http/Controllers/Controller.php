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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function data_collection(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $page = 'data';
        return view('data_collection')->with([
           'page' => $page
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function users()
    {
        $page = 'users';
        return view('users')->with([
           'page' => $page
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
//    Search can be done by room number, index number or last name
    public function search(Request $request)
    {
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

    /**
     * @param $id
     * @param $room_number
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * Key Returned to the porter's lodge
     *
     * Key_status = 1 => Key has been taken
     * Key_status = 0 => Key is in the porter's lodge
     *
     */
    public function key_in($id, $room_number){

        $contacts = Occupants::where([
            ['room_number', $room_number],
            ['id', '!=', $id]
        ])->get('contact');


//        Validate id and room number
        $id_valid = Occupants::where('id', $id)->get();
        $room_number_valid = Occupants::where('room_number', $room_number)->get();

        if ($id_valid && $room_number_valid)
        {
//            Change key status of all roommates to 1
            Occupants::where('room_number', $room_number)
                ->update([
                    'key_status' => 0
                ]);
            Occupants::where('room_number', $room_number)
                ->update([
                   'hasKey' => 0
                ]);
            return back();
        }else{
            return redirect('/');
        }

    }

    /**
     * @param $id
     * @param $room_number
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function key_out($id, $room_number){

        $room_mate_numbers = Occupants::where([
            ['room_number', $room_number],
            ['id', '!=', $id]
        ])->get('contact');

//        Validate id and room number
        $id_valid = Occupants::where('id', $id)->get();
        $room_number_valid = Occupants::where('room_number', $room_number)->get();

        if ($id_valid && $room_number_valid)
        {
//            Change key status of all roommates to 1
            Occupants::where('room_number', $room_number)
                ->update([
                    'key_status' => 1
                ]);
            Occupants::where('id', $id)
                ->update([
                   'hasKey' => 1
                ]);
            return back();
        }else{
            return redirect('/');
        }

    }
}
