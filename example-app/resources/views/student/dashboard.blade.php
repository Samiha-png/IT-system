@extends('layouts.app')

@section('header')
    Student Support Center
@endsection

@section('content')
<div class="space-y-10">
    <div class="relative overflow-hidden bg-gradient-to-r from-indigo-600 to-purple-700 rounded-[2.5rem] p-10 shadow-2xl">
        <div class="relative z-10">
            <h1 class="text-4xl font-black text-white mb-2 tracking-tight">
                Welcome Back, {{ Auth::user()->name }}!
            </h1>
            <p class="text-indigo-100 text-lg font-medium opacity-90">
                Facing technical issues? Submit a report and our team will be on it.
            </p>
        </div>
        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        
        <div class="lg:col-span-1">
            <div class="glass-card p-8 sticky top-28 border-t-4 border-indigo-500">
                <h3 class="text-xl font-black text-white mb-6 flex items-center uppercase tracking-tighter italic">
                    <svg class="w-6 h-6 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    Report New Issue
                </h3>
                
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-2xl text-xs font-bold uppercase tracking-widest">
                        🚀 {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('tickets.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">System IP Address</label>
                        <input type="text" value="{{ request()->ip() }}" 
                            class="mt-2 w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-4 text-indigo-400 font-mono text-sm focus:outline-none cursor-not-allowed opacity-70" readonly>
                        <p class="text-[9px] text-slate-600 mt-2 ml-1 italic">* Auto-detected for faster resolution</p>
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Describe Problem</label>
                        <textarea name="description" rows="4" 
                            class="mt-2 w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-4 text-white text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all outline-none placeholder-slate-600" 
                            placeholder="Example: PC not turning on, No internet, Software error..." required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-[0.2em] text-[11px] py-5 rounded-2xl shadow-xl shadow-indigo-500/20 transform transition active:scale-95">
                        Dispatch Ticket
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="glass-card overflow-hidden">
                <div class="p-8 border-b border-white/5 flex justify-between items-center bg-white/5">
                    <h3 class="text-xl font-black text-white italic uppercase tracking-tighter">Your Report History</h3>
                    <div class="flex items-center space-x-2">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest text-emerald-500">Live Status</span>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left bg-white/5">
                                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Issue Details</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] text-center">Current Status</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] text-right">Team Remarks</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @forelse($tickets as $ticket)
                            <tr class="hover:bg-white/5 transition-colors group">
                                <td class="px-8 py-6">
                                    <div class="text-white font-bold text-sm mb-1 group-hover:text-indigo-400 transition">{{ Str::limit($ticket->description, 50) }}</div>
                                    <div class="flex items-center text-[10px] text-slate-500 font-bold uppercase tracking-tighter">
                                        <span class="bg-indigo-500/10 text-indigo-400 px-2 py-0.5 rounded mr-2 border border-indigo-500/20">{{ $ticket->ip_address }}</span>
                                        {{ $ticket->created_at->diffForHumans() }}
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    @php
                                        $statusClasses = [
                                            'Open' => 'bg-rose-500/10 text-rose-500 border-rose-500/20',
                                            'In Progress' => 'bg-amber-500/10 text-amber-500 border-amber-500/20',
                                            'Resolved' => 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20'
                                        ];
                                    @endphp
                                    <span class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest border {{ $statusClasses[$ticket->status] ?? 'bg-slate-500/10 text-slate-400 border-white/5' }}">
                                        {{ $ticket->status }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <p class="text-[11px] font-medium italic text-slate-400">
                                        {{ $ticket->admin_note ?? 'Awaiting technical review...' }}
                                    </p>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-8 py-24 text-center">
                                    <svg class="w-16 h-16 mx-auto mb-4 text-slate-700 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01"></path>
                                    </svg>
                                    <span class="text-slate-500 font-black uppercase tracking-widest text-[10px]">No issues reported yet. Your record is clean!</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection