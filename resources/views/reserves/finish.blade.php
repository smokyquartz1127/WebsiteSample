@extends('layouts.logged_in')

@section('main')
    <div class="finish_thanks">
        <h2>ご予約ありがとうございます！</h2>
    </div>
    <div class="container detail">
        <div class="form_item">
            <label>お名前：&nbsp;
                <span>{{ \Auth::user()->name }}</span>&nbsp;さん
            </label>
        </div>
        <div class="form_item">
            <label>お部屋：
                <span>{{ $room }}</span>
            </label>
        </div>
        <div class="form_item">
            <label>人数：
                <span>{{ $number }}</span>&nbsp;名様
            </label>
        </div>
        <div class="form_item">
            <label>期間：
                <span>{{ $start }}</span>&nbsp;～&nbsp;<span>{{ $end }}</span>
            </label>
        </div>
    </div>
    <p class="finish_backhome"><a href="{{ route('home') }}">&lt;ホームへ戻る&gt;</a></p>
@endsection
