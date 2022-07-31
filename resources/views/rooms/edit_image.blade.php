@extends('layouts.admini')

@section('main')
    <a href="{{ route('adminroom') }}">&lt;ホームへ戻る</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="detail">
        <div>
            <p>現在の画像</p>
            @if ($room->image !== '')
                <img src="{{ asset('storage/' . $room->image) }}">
            @else
                <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
            @endif
        </div>
        <form method="POST" action="{{ route('room.updateimage', $room->id) }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div>
                <label>現在の画像：
                    <input type="file" name="image">
                </label>
            </div>
            <input type="submit" value="更新" class="submit">
        </form>
    </div>
@endsection
