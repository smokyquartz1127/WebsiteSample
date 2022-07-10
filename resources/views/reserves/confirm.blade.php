@extends('layouts.logged_in')

@section('main')
    <div class="row flex_reserve">
        <div class="reserve_left col-md-6 col-10">
            <h2>予約確認画面</h2>
            <form>
                @csrf
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">お名前：&nbsp;
                        <span>{{ \Auth::user()->name }}</span>&nbsp;さん
                    </label>
                    <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                </div>
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">お部屋：
                        <span>{{ $room }}</span>
                    </label>
                    <input type="hidden" name="room_id" value="{{ $room_id }}">
                </div>
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">人数：
                        <span>{{ $number }}</span>&nbsp;名様
                    </label>
                    <input type="hidden" name="number" value="{{ $number }}">
                </div>
                <div class="form-group form-row">
                    <label class="col-form-label text-md-right">期間：
                        <span>{{ $start }}</span>&nbsp;～&nbsp;<span>{{ $end }}</span>
                    </label>
                    <input type="hidden" name="start" value="{{ $start }}">
                    <input type="hidden" name="end" value="{{ $end }}">
                </div>
                <div class="reserve_bill d-block d-md-none">
                    <h2>合計金額</h2>
                    <p>{{ $price * $number }}円</p>
                    <ul>
                        <li>&#149;{{ $room }}&nbsp;{{ $number }}名様</li>
                    </ul>
                </div>
                <input formmethod="GET" type="submit" formaction="{{ route('reserves.again') }}"
                    class="submit btn btn-secondary" value="入力画面に戻る">
                <input formmethod="POST" type="submit" formaction="{{ route('reserves.regist') }}"
                    class="submit btn btn-primary" value="予約する">
            </form>
        </div>
        <div class="reserve_right col-3 d-none d-md-block">
            <h2>合計金額</h2>
            <p>{{ $price * $number }}円</p>
            <ul>
                <li>&#149;{{ $room }}&nbsp;{{ $number }}名様</li>
            </ul>
        </div>
    </div>
@endsection
