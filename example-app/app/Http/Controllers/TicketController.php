<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * STUDENT: Issue Report Form
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * STUDENT: Save the issue
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|min:10',
        ]);

        Ticket::create([
            'user_id' => auth()->id(),
            'ip_address' => $request->ip(), // Auto-capture student's PC IP
            'description' => $request->description,
            'status' => 'Open',
        ]);

        return redirect()->route('dashboard')->with('success', 'Issue reported to Network Team!');
    }

    /**
     * STUDENT: View their own issue status
     */
    public function studentDashboard()
    {
        $tickets = Ticket::where('user_id', Auth::id())->latest()->get();
        return view('student.dashboard', compact('tickets'));
    }

    /**
     * NETWORK TEAM: View all issues (tickets/index.blade.php)
     */
    public function adminIndex()
    {
        // Yahan 'tickets.index' aapka folder structure handle kar raha hai
        $tickets = Ticket::with('user')->latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * NETWORK TEAM: Update status & resolution note
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:Open,In Progress,Resolved',
            'admin_note' => 'nullable|string|max:500'
        ]);

        $ticket->update([
            'status' => $request->status,
            'admin_note' => $request->admin_note
        ]);

        return redirect()->back()->with('success', 'Ticket status updated successfully!');
    }

    /**
     * FACULTY / LAB COORDINATOR: Monitoring & Statistics
     */
    public function facultyDashboard()
    {
        $stats = [
            'total'    => Ticket::count(),
            'open'     => Ticket::where('status', 'Open')->count(),
            'progress' => Ticket::where('status', 'In Progress')->count(),
            'resolved' => Ticket::where('status', 'Resolved')->count(),
        ];

        // Faculty sab dekh sakti hai lekin update nahi kar sakti (only monitoring)
        $tickets = Ticket::with('user')->latest()->get();

        return view('tickets.faculty', compact('stats', 'tickets'));
    }
}