@extends('layouts.admini')

@section('main')
<div class="room_container row">
    <ul class="room_left_bar col-2 d-none d-lg-block" id="pagelink">
        <p><a href="{{ route('rooms.create') }}">＞新規部屋登録</a></p>
        @forelse($rooms as $room)
            <li><a class="slide_btn borderleft" href="#{{ $room->id }}"><span>{{ $room->name }}</span></a></li>
        @empty
            <p>現在、泊まれるお部屋はありません。</p>
        @endforelse
    </ul>
    <div class="col-12 col-md-8">
        @forelse($rooms as $room)
            <div class="room_box" id="{{ $room->id }}">
                <div class="room_explain">
                    <h2>『{{ $room->name }}』</h2>
                    <h3 class="room_message">&nbsp;{{ $room->note }}</h3>
                    <ul>
                        <li>定員:&nbsp;{{ $room->number }}&nbsp;名様</li>
                        <li>アメニティ:&nbsp;{{ $room->amenity }}</li>
                        <li>価格(/1人):&nbsp;{{ $room->price }}&nbsp;円</li>
                        <li>支払方法:&nbsp;{{ $room->pay }}</li>
                    </ul>
                    <div class="edit_button">
                        <a href="{{ route('rooms.edit', $room->id) }}" class="submit">編集</a>
                        <form method="POST" action="{{ route('rooms.destroy', $room->id) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="削除" class="submit">
                        </form>
                    </div>
                </div>
                <div class="room_image">
                    <img src="{{ asset('storage/' . $room->image) }}">
                    <p class="change_image_button"><a href="{{ route('room.editimage', $room->id) }}">＜画像を変更する＞</a></p>
                </div>
            </div>
        @empty
            <p>現在、泊まれるお部屋はありません。</p>
        @endforelse
    </div>
</div>
@endsection
