@extends('template')
@section('title', '掲示板')
@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-6">
                <h5>掲示板</h5>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('events.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">日付 </th>
                            <th scope="col">タイトル</th>
                            <th scope="col">名前</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (count($events) > 0)
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event->date }}</td>
                            <td><a href="{{ route('events.show', ['event' => $event->id]) }}">{{ $event->title }}</a></td>
                            <td>{{ $event->name }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="3">Data Not Found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                @if (count($events) > 0)
                    <div class="d-flex justify-content-center">
                        {{ $events->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
