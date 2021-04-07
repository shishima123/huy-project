@extends('template')
@section('title', 'confirm')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 px-5">
                <p>登録しました。</p>
                <a href="{{ route('events.index') }}">一覧へ戻る</a>
            </div>
        </div>
    </div>
@endsection
