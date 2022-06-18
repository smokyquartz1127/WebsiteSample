@extends('layouts.logged_in')

@section('main')
<div class="room_container row">
    <ul class="room_left_bar col-2 d-none d-lg-block" id="pagelink">
        @forelse($rooms as $room)
            <li><a class="slide_btn borderleft" href="#{{ $room->id }}"><span>{{ $room->name }}</span></a></li>
        @empty
            <p>現在、泊まれるお部屋はありません。</p>
        @endforelse
    </ul>
    <div class="room_main col-12 col-md-8">
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
                </div>
                <div class="room_image">
                    <img src="{{ asset('storage/' . $room->image) }}"> </p>
                </div>
            </div>
        @empty
            <p>現在、泊まれるお部屋はありません。</p>
        @endforelse
    </div>
</div>
@endsection
