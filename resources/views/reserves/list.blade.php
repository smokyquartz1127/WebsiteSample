@extends('layouts.admini')

@section('main')
<h2>予約一覧</h2>
<table border="1">
    <tr>
        <td>チェックイン</td>
        <td>チェックアウト</td>
        <td>お名前</td>
        <td>お部屋</td>
        <td>人数</td>
    </tr>
    @forelse($reserves as $reserve)
        <tr>
            <td>{{ $reserve->start }}</td>
            <td>{{ $reserve->end }}</td>
            <td>{{ $reserve->user->name }}</td>
            <td>{{ $reserve->room->name }}</td>
            <td>{{ $reserve->number }}</td>
        </tr>
    @empty
        <li>予約はありません。</li>
    @endforelse
</table>
@endsection
