@extends('layouts.default')

@section('main')
    <a href={{ route('adminblog') }}>&lt;戻る</a>
    <div class="detail">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <p>現在の画像</p>
            @if ($blog->image !== '')
                <img src="{{ asset('storage/' . $blog->image) }}">
            @else
                <img src="{{ asset('css/image/bird_shima_fukurou.png') }}">
            @endif
        </div>
        <form method="POST" action="{{ route('blogs.updateimage', $blog->id) }}" enctype="multipart/form-data">
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
