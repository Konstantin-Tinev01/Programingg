<?php

namespace App\Http\Controllers;

use App\Models\Desk;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;

class AdministrativeRightsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$rooms = Room::all();
        //foreach (Room::all() as $room) {
            //echo $room->id;sd
        //}

        return new RoomCollection(Room::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_room');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'room_number' => 'required',
            'type_of_room' => 'required',
            //'room_manager' => 'required',
            'id_of_room_manager' => 'required',
        ]);

        $room_manager_name = User::find($request->id_of_room_manager)->name;
        $room_manager_last_name = User::find($request->id_of_room_manager)->last_name;

        $room = Room::create([
            'room_number' => $request->room_number,
            'type_of_room' => $request->type_of_room,
            'money_per_week' => 0,
            'count_of_desks' => 0,
            'room_manager' => $room_manager_name." ".$room_manager_last_name,
            'id_of_room_manager' => $request->id_of_room_manager,
        ]);

        DB::table('users')->where('id', $request->id_of_room_manager)->update(['room'=> $room->id]);
        $user = DB::table('users')->where('id', $request->id_of_room_manager)->update(['role'=> 'room_manager']);

        return "Room";//redirect()->route('create_desks_api');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            return new RoomResource(Room::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
    public function destroy($id)
    {
        DB::table('users')->where('room', $id)->update(['role'=> 'client']);
        DB::table('users')->where('room', $id)->update(['room'=> '0']);
        DB::table('rooms')->where('id', $id)->delete();

        return "Remove";
    }

    public function desks(Request $request)
    {

        $this->validate($request, [
            'room' => 'required',
            'room_manager' => 'required',
            'price' => 'required',
            'size' => 'required',
            'position' => 'required',
        ]);

        $desks = Desk::create([
            'room' => $request->room,
            'client_id' => 0,
            'room_manager' => $request->room_manager,
            'price' => $request->price,
            'size' => $request->size,
            'is_taken' => false,
            'time_for_taken' => now(),
            'position' => $request->position,
        ]);

        return "desks";
    }
}
