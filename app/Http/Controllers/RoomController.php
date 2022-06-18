<?php

namespace App\Http\Controllers;

use App\Room;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\ImageRequest;
use App\Services\FileUploadService;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', [
            'rooms' => $rooms,
        ]);
    }
    public function index_all()
    {
        $rooms = Room::all();
        return view('rooms.index_all', [
            'rooms' => $rooms,
        ]);
    }

    public function adminindex()
    {
        $rooms = Room::all();
        return view('rooms.index_admin', [
            'rooms' => $rooms,
        ]);
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(RoomRequest $request, FileUploadService $service)
    {
        $path = $service->saveImage($request->file('image'));
        Room::create([
            'name' => $request->name,
            'number' => $request->number,
            'amenity' => $request->amenity,
            'price' => $request->price,
            'pay' => $request->pay,
            'note' => $request->note,
            'image' => $path,
        ]);
        return redirect()->route('adminroom');
    }

    public function edit($id)
    {
        $room = Room::find($id);
        return view('rooms.edit', [
            "room" => $room,
        ]);
    }

    public function update(RoomRequest $request, $id)
    {
        $room = Room::find($id);
        $room->update($request->only([
            'name', 'number', 'price', 'pay', 'amenity', 'note',
        ]));
        session()->flash('success', '部屋情報を更新しました。');
        return redirect()->route('adminroom');
    }

    public function editImage($id)
    {
        $room = Room::find($id);
        return view('rooms.edit_image', [
            'room' => $room,
        ]);
    }

    public function updateImage(FileUploadService $service, ImageRequest $request, $id)
    {
        $path = $service->saveImage($request->file('image'));
        $room = Room::find($id);
        if($room->image !== ''){
            \Storage::disk('public')->delete(\Storage::url($room->image));
        }

        $room->update([
            'image' => $path,
        ]);
        return redirect()->route('adminroom');
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();
        session()->flash('success', '部屋情報を削除しました。');
        return redirect()->route('adminroom');
    }
}
