<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

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

        return Room::all();
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
            //'money_per_week' => 'required',
            'count_of_desks' => 'required',
            'room_manager' => 'required',
            'id_of_room_manager' => 'required',
        ]);

        $room = Room::create([
            'room_number' => $request->room_number,
            'type_of_room' => $request->type_of_room,
            'money_per_week' => 0,
            'count_of_desks' => $request->count_of_desks,
            'room_manager' => $request->room_manager,
            'id_of_room_manager' => $request->id_of_room_manager,
        ]);

        return "Room name: ".$room->room_number;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Room::find($id);
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
        DB::table('rooms')->where('id', $id)->delete();

        return "Remove";
    }
}
