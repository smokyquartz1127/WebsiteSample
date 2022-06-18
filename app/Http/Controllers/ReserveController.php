<?php

namespace App\Http\Controllers;

use App\Room;
use App\Http\Requests\ReserveRequest;

class ReserveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //---------一覧（管理者のみ）------------
    public function list()
    {
        $reserves = Reserve::all();
        return view('reserves.list', [
            'reserves' => $reserves,
        ]);
    }

    //----------------予約----------------
    public function index()
    {
        $rooms = Room::all();
        return view('reserves.reserve', [
            'title' => '予約フォーム',
            'rooms' => $rooms,
        ]);
    }

    public function confirm(ReserveRequest $request)
    {
        $room_id = $request->room_id;
        $room = Room::find($room_id)->name;
        $number = $request->number;
        $start = $request->start;
        $end = $request->end;
        $price = Room::find($room_id)->price;

        return view('reserves.confirm', [
            'room' => $room,
            'room_id' => $room_id,
            'number' => $number,
            'start' => $start,
            'end' => $end,
            'price' => $price,
        ]);
    }

    public function regist(ReserveRequest $request)
    {
        $data = Reserve::create([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'number' => $request->number,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return redirect()->route('reserves.finish', $data->id);
    }

    public function again(ReserveRequest $request)
    {
        $room_id = $request->room_id;
        $rooms = Room::all();
        //$select_room = Room::find($room_id)->get()->name;
        $number = $request->number;
        $start = $request->start;
        $end = $request->end;
        $price = Room::find($room_id)->price;

        return view('reserves.again', [
            //'select_room' => $select_room,
            'rooms' => $rooms,
            'room_id' => $room_id,
            'number' => $number,
            'start' => $start,
            'end' => $end,
            'price' => $price,
        ]);
    }

    public function finish($id)
    {
        $reserve = Reserve::find($id);
        return view('reserves.finish', [
            'room' => $reserve->room->name,
            'room_id' => $reserve->room_id,
            'number' => $reserve->number,
            'start' => $reserve->start,
            'end' => $reserve->end,
        ]);
    }
}
