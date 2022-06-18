@extends('layouts.admini')

@section('main')
    <div class="room_container">
        <div class="room_right_bar">
            <p><a>部屋一覧</a></p>
            <p><a href="{{ route('rooms.create') }}">新規部屋登録</a></p>
        </div>
        <div class="room_main">
            @forelse($rooms as $room)
                <div class="room_box">
                    <h2>{{ $room->name }}</h2>
                    <div class="room_explain">
                        <div>
                            <ul>
                                <h3 class="room_message">&nbsp;{{ $room->note }}</h3>
                                <li>定員:&nbsp;{{ $room->number }}&nbsp;名様</li>
                                <li>アメニティ:&nbsp;{{ $room->amenity }}</li>
                                <li>価格(/一泊):&nbsp;{{ $room->price }}&nbsp;円</li>
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
                        <div>
                            <img src="{{ asset('storage/'. $room->image) }}">
                            <p class="change_image_button"><a href="{{ route('room.editimage', $room->id) }}">画像を変更する</a></p>
                        </div>
                    </div>
                </div>
            @empty
                <p>登録されている部屋はありません。</p>
            @endforelse
        </div>
    </div>

@endsection
