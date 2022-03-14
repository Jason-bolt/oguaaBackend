<?php

namespace App\Http\Controllers;

use App\Models\Occupants;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Intervention\Image\Facades\Image;

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
        $users = User::where('is_admin')->get(); // is null
        $page = 'users';
        return view('users')->with([
           'page' => $page,
            'users' => $users
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create_user(Request $request)
    {
//        dd($request);
        $request->validate([
            'username' => ['string', 'max:20'],
            'password' => ['string', Rules\Password::defaults()]
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

//        User::create([
//            'username' => $request->username,
//            'password' => Hash::make($request->password)
//        ]);

        return back();
    }

    public function delete_user($id)
    {
        User::where('id', $id)->firstOrFail();
        User::where('id', $id)->delete();
        return back();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_occupant(Request $request) {

        $request->validate([
            'image' => ['required', 'mimes:jpg,png,jpeg,gif'],
            'first_name' => ['required', 'string'],
            'other_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'contact' => ['required', 'string'],
            'program' => ['required', 'string'],
            'level' => ['required', 'string'],
            'index_number' => ['required', 'string', 'unique:occupants'],
            'room_number' => ['required', 'string'],
        ]);

        $occupant_image = time() . '_' . $request->last_name . '.' . $request->image->extension();
        $img = Image::make($request->image);
        $img_size = $request->image->getSize();
//        dd($img_size);
        if ($img_size <= 5242880) // Below 5MB
        {
            $request->image->move(public_path('occupants_image'), $occupant_image);
        }elseif ($img_size <= 10485760) // Below 10MB
        {
            $img->save(public_path('occupants_image/' . $occupant_image));
        }elseif ($img_size <= 15728640) // Below 15MB
        {
            $img->save(public_path('occupants_image/' . $occupant_image), '80');
        }elseif ($img_size <= 20971520) // Below 20MB
        {
            $img->save(public_path('occupants_image/' . $occupant_image), '70');
        }elseif ($img_size <= 26214400) // Below 25MB
        {
            $img->save(public_path('occupants_image/' . $occupant_image), '60');
        }elseif ($img_size <= 31457280) // Below 30MB
        {
            $img->save(public_path('occupants_image/' . $occupant_image), '50');
        }else // Above 30MB
        {
            $img->save(public_path('occupants_image/' . $occupant_image), '30');
        }
//        $img->save(public_path('occupants_image/' . $occupant_image), '4');
//        $request->image->move(public_path('occupants_image'), $occupant_image);

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

    public function edit_occupant(Request $request, $id)
    {
        if ($request->image == null)
        {
            $request->validate([
                'first_name' => ['required', 'string'],
                'other_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'contact' => ['required', 'string'],
                'program' => ['required', 'string'],
                'level' => ['required', 'string'],
                'index_number' => ['required', 'string'],
                'room_number' => ['required', 'string'],
            ]);

            Occupants::where('id', $id)
            ->update([
                'first_name' => $request->first_name,
                'other_name' => $request->other_name,
                'last_name' => $request->last_name,
                'contact' => $request->contact,
                'program' => $request->program,
                'level' => $request->level,
                'index_number' => $request->index_number,
                'room_number' => $request->room_number,
            ]);
        }else{
            $request->validate([
                'image' => ['required', 'mimes:jpg,png,jpeg,gif', 'max:5048'],
                'first_name' => ['required', 'string'],
                'other_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'contact' => ['required', 'string'],
                'program' => ['required', 'string'],
                'level' => ['required', 'string'],
                'index_number' => ['required', 'string'],
                'room_number' => ['required', 'string'],
            ]);

            $occupant_image = time() . '_' . $request->last_name . '.' . $request->image->extension();
            $request->image->move(public_path('occupants_image'), $occupant_image);

            Occupants::where('id', $id)
            ->update([
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
        }

        return redirect('/');
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
            $room_mate_numbers = Occupants::where([
                ['room_number', $room_number]
            ])->get('contact');

            $numbers_arr = $room_mate_numbers->toArray();

            $num_arr = array();
            foreach ($numbers_arr as $number)
            {
                $num_arr[] = $number['contact'];
            }

            $key_holder = Occupants::where('id', $id)->get()->toArray()[0];

//            Change key status of all roommates to 1
            Occupants::where('room_number', $room_number)
                ->update([
                    'key_status' => 0
                ]);
            Occupants::where('room_number', $room_number)
                ->update([
                   'hasKey' => 0
                ]);

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://sms.arkesel.com/api/v2/sms/send',
                CURLOPT_HTTPHEADER => ['api-key:aG1veXpRVXRUb0hhSFJ2ZkRJck8'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => http_build_query([
                    'sender' => 'Oguaa Hall',
//                    'message' => 'Key status:turned in by Nhana Qwahame',
                    'message' => 'Key status: Turned in by ' . $key_holder['first_name'] . ' ' . $key_holder['other_name'] . ' ' . $key_holder['last_name'],
                    'recipients' => $num_arr
                ]),
            ]);

            $response = curl_exec($curl);

            curl_close($curl);
            return redirect('/search?search_query=' . $room_number);
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
//        Validate id and room number
        $id_valid = Occupants::where('id', $id)->get();
        $room_number_valid = Occupants::where('room_number', $room_number)->get();

        if ($id_valid && $room_number_valid)
        {
            $room_mate_numbers = Occupants::where([
                ['room_number', $room_number]
            ])->get('contact');

            $numbers_arr = $room_mate_numbers->toArray();

            $num_arr = array();
            foreach ($numbers_arr as $number)
            {
                $num_arr[] = $number['contact'];
            }

            $key_holder = Occupants::where('id', $id)->get()->toArray()[0];

//            dd($key_holder);

//            Change key status of all roommates to 1
            Occupants::where('room_number', $room_number)
                ->update([
                    'key_status' => 1
                ]);
            Occupants::where('id', $id)
                ->update([
                   'hasKey' => 1
                ]);

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://sms.arkesel.com/api/v2/sms/send',
                CURLOPT_HTTPHEADER => ['api-key:aG1veXpRVXRUb0hhSFJ2ZkRJck8'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => http_build_query([
                    'sender' => 'Oguaa Hall',
//                    'message' => 'Key status:turned in by Nhana Qwahame',
                    'message' => 'Key status: Taken by ' . $key_holder['first_name'] . ' ' . $key_holder['other_name'] . ' ' . $key_holder['last_name'],
                    'recipients' => $num_arr
                ]),
            ]);

            $response = curl_exec($curl);

            curl_close($curl);
            return redirect('/search?search_query=' . $room_number);
        }else{
            return redirect('/');
        }

    }
}
