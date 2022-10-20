<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        return view('pages.tickets.index')->with('tickets',Ticket::orderBy('id','desc')->get());
    }
    public function destroy($id){
        Ticket::find($id)->delete();
        Alert::success('Success', 'Deleted successfully');
        return redirect()->back();
    }
    public function show($id){
       $ticket =  Ticket::find($id) ;
       $ticket->status =1;
       $ticket->save();
       return view('pages.tickets.show')->with('ticket',$ticket);
    }
}
