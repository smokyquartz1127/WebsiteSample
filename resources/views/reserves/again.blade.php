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
            <h2>予約訂正画面</h2>
            <form method="GET" action="{{ route('reserves.confirm') }}">
                @csrf
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">お名前：&nbsp;
                        <span>{{ \Auth::user()->name }}</span>&nbsp;さん
                    </label>
                    <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                </div>
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">お部屋：
                        <select name="room_id">
                            @forelse($rooms as $room)
                                @if ($room_id === $room->id)
                                    <option value="{{ $room->id }}" selected="selcted">{{ $room->name }}</option>
                                @else
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endif
                            @empty
                                <p>泊まれる部屋がありません</p>
                            @endforelse
                        </select>
                    </label>
                </div>
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">人数：
                        <input type="number" name="number" value="{{ $number }}">&nbsp;名様
                    </label>
                </div>
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">期間：
                        <input type="date" name="start" value="{{ $start }}">~<input type="date" name="end"
                            value="{{ $end }}">
                    </label>
                </div>
                <input type="submit" class="submit btn btn-primary" value="確認画面へ戻る">
            </form>
        </div>
    </div>
@endsection
