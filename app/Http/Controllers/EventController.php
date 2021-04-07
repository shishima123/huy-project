<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventModel;
    public function __construct(Event $event)
    {
        $this->eventModel = $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        session()->forget('input');
        $events = $this->eventModel->getList();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('events.create');
    }

    public function confirm(EventRequest $request)
    {
        $input = $request->all();
        session(['input' => $input]);
        return view('events.confirm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $input = session('input');
        $this->eventModel->storeData($input);
        session()->forget('input');
        return view('events.complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return mixed
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }
}
