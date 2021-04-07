@extends('template')
@section('title', '掲示板')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('events.confirm') }}" method="POST">
                    @php
                        $input = session('input');
                    @endphp
                    @csrf
                    <div class="mb-3 row">
                        <label for="date" class="col-sm-2 col-form-label">日付</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error("date") is-invalid @enderror" id="date" name="date" value="{{ old('date') ?: ($input['date'] ?? '') }}">
                            @error("date")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="title" class="col-sm-2 col-form-label">タイトル</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error("title") is-invalid @enderror" id="title" name="title" value="{{ old('title') ?: ($input['title'] ?? '') }}">
                            @error("title")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">名前</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old('name') ?: ($input['name'] ?? '') }}">
                            @error("name")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="text" class="col-sm-2 col-form-label">本文</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error("text") is-invalid @enderror" id="text" name="text" rows="3">{{ old('text') ?: ($input['text'] ?? '') }}</textarea>
                            @error("text")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row mt-5">
                        <div class="col-sm-10 text-center">
                            <button type="submit" class="btn btn-primary ">確認画面へ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
