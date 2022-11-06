<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('pages.tickets.index')->with('tickets', Ticket::orderBy('id', 'desc')->get());
    }
    public function destroy($id)
    {
        Ticket::find($id)->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();
    }
    public function send_replay(Request $request)
    {
        $replay = new TicketReply();
        $replay->body = $request->body;
        $replay->ticket_id = $request->ticket_id;
        $replay->user_id = auth()->id();
        $replay->save();
        $ticket = Ticket::find($request->ticket_id);
        $ticket->status = 2;
        $ticket->save();
        dd($ticket);
        Alert::success('Success', 'Replay successfully');
        return redirect()->back();
    }
    public function show($id)
    {
        $ticket =  Ticket::find($id);
        $ticket->status = 1;
        $ticket->save();
        return view('pages.tickets.show')->with('ticket', $ticket);
    }
}
