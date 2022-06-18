@extends('layouts.admini')

@section('main')
    <h2>新しい部屋をつくる</h2>
    <a href="{{ route('adminroom') }}">&lt;ホームへ戻る</a>
    <div class="detail">
        <form method="POST" action="{{ route('rooms.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label>部屋名：
                    <input type="text" name="name">
                </label>
            </div>
            <div>
                <label>定員：
                    <input type="number" name="number">
                </label>
            </div>
            <div>
                <label>アメニティ：
                    <input type="text" name="amenity">
                </label>
            </div>
            <div>
                <label>価格(一泊):
                    <input type="number" name="price">
                </label>
            </div>
            <div>
                <label>支払方法：
                    <input type="text" name="pay" value="現金">
                </label>
            </div>
            <div>
                <label>コメント：
                    <input type="text" name="note">
                </label>
            </div>
            <div>
                <label>画像：
                    <input type="file" name="image">
                </label>
            </div>
            <input type="submit" value="登録" class="submit">
        </form>
    </div>
@endsection
