<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        return view('pages.tickets.index')->with('tickets',Ticket::orderBy('id','desc')->get());
    }
}
