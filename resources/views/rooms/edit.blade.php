@extends('layouts.admini')

@section('main')
    <h2>編集</h2>
    <a href="{{ route('adminroom') }}">&lt;ホームへ戻る</a>
    <div class="detail">
        <form method="POST" action="{{ route('rooms.update', $room->id) }}">
            @method('patch')
            @csrf
            <div>
                <label>部屋名：
                    <input type="text" name="name" value="{{ $room->name }}">
                </label>
            </div>
            <div>
                <label>定員：
                    <input type="number" name="number" value="{{ $room->number }}">
                </label>
            </div>
            <div>
                <label>アメニティ：
                    <input type="text" name="amenity" value="{{ $room->amenity }}">
                </label>
            </div>
            <div>
                <label>価格(一泊):
                    <input type="number" name="price" value="{{ $room->price }}">
                </label>
            </div>
            <div>
                <label>支払方法：
                    <input type="text" name="pay" value="{{ $room->pay }}">
                </label>
            </div>
            <div>
                <label>コメント：
                    <input type="text" name="note" value="{{ $room->note }}">
                </label>
            </div>
            <input type="submit" value="保存" class="submit">
        </form>
    </div>
@endsection
