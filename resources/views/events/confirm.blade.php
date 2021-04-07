@extends('template')
@section('title', 'confirm')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 px-5">
                @php
                    $input = session('input');
                @endphp
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">日付</label>
                    <div class="col-sm-10">
                        <p>{{ $input['date'] }}</p>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">タイトル</label>
                    <div class="col-sm-10">
                        <p>{{ $input['title'] }}</p>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">名前</label>
                    <div class="col-sm-10">
                        <p>{{ $input['name'] }}</p>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="text" class="col-sm-2 col-form-label">本文</label>
                    <div class="col-sm-10">
                        <p>{{ $input['text'] }}</p>
                    </div>
                </div>

                <div class="mb-3 row mt-5">
                    <div class="col-sm-10 d-flex justify-content-center">
                        <form action="{{ route('events.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary mx-5">登録する</button>
                        </form>
                        <a href="{{ route('events.create') }}"  class="btn btn-primary mx-5">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
