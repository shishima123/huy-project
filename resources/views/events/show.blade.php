@extends('template')
@section('title', 'Detail')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-4">
                <p>{{ $event->date }}</p>
            </div>
            <div class="col-8">
                <p>{{ $event->title }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>{{ $event->name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>{{ $event->text }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 text-center">
                @if ($event->prev_item)
                    <a href="{{ route('events.show', ['event' => $event->prev_item]) }}">前の記事</a>
                @endif
            </div>

            <div class="col-6 text-center">
                @if ($event->next_item)
                    <a href="{{ route('events.show', ['event' => $event->next_item]) }}">次の記事</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('events.index') }}">一覧に戻る</a>
            </div>
        </div>
    </div>
@endsection
