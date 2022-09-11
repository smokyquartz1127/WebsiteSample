@extends('layouts.logged_in')

@section('main')
    <div class="flex_reserve">
        <div class="reserve_left col-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="reserve_header_title">{{ $title }}</h1>
            <form method="GET" action="{{ route('reserves.confirm') }}">
                @csrf
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">お名前：&nbsp;
                        <span>{{ \Auth::user()->name }}</span>&nbsp;さん
                        <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                    </label>
                </div>
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">泊まりたいお部屋を選んでください
                        <select name="room_id" required>
                            <option value=" " hidden>部屋を選択してください。</option>
                            @forelse($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @empty
                                <p>泊まれる部屋がありません</p>
                            @endforelse
                        </select>
                    </label>
                </div>
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">人数：
                        <input type="number" name="number">&nbsp;名様</label>
                </div>
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">泊まりたい日を選択してください。
                        <input type="date" name="start">～<input type="date" name="end"></label>
                </div>
                <input class="submit btn btn-primary" type="submit" value="次へ">
            </form>
        </div>
    </div>
@endsection
