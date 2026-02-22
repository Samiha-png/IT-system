@extends('layouts.app')

@section('header')
    NetSquad Mission Control
@endsection

@section('content')
<div class="space-y-8">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center bg-white/5 border border-white/10 p-8 rounded-[2.5rem] backdrop-blur-xl">
        <div>
            <h2 class="text-2xl font-black text-white italic tracking-tight uppercase">Support Queue</h2>
            <p class="text-slate-500 text-sm font-medium mt-1">Operational Overview & Ticket Resolution</p>
        </div>
        <div class="mt-4 md:mt-0 flex items-center bg-indigo-500/10 border border-indigo-500/20 rounded-2xl px-6 py-4">
            <div class="relative flex h-3 w-3 mr-4">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
            </div>
            <span class="text-xs font-black text-indigo-400 uppercase tracking-[0.2em]">
                Active Missions: {{ $tickets->where('status', '!=', 'Resolved')->count() }}
            </span>
        </div>
    </div>

    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white/5 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">
                        <th class="px-8 py-6">Target System</th>
                        <th class="px-8 py-6">Intelligence / Issue</th>
                        <th class="px-8 py-6 text-center">Status Tracking</th>
                        <th class="px-8 py-6 text-right">Action Center</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($tickets as $ticket)
                    <tr class="hover:bg-white/[0.02] transition-all group">
                        <td class="px-8 py-8">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-slate-800 to-slate-900 border border-white/10 flex flex-col items-center justify-center text-indigo-400 shadow-xl group-hover:border-indigo-500/50 transition">
                                    <span class="text-[9px] font-black leading-none opacity-50">NODE</span>
                                    <span class="text-sm font-black">{{ substr($ticket->ip_address, -2) }}</span>
                                </div>
                                <div>
                                    <div class="text-sm font-black text-white mb-1">{{ $ticket->user->name }}</div>
                                    <div class="text-[10px] font-mono text-indigo-400/80 bg-indigo-500/5 border border-indigo-500/10 px-2 py-0.5 rounded italic">
                                        {{ $ticket->ip_address }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-8 py-8">
                            <div class="max-w-xs">
                                <p class="text-sm text-slate-300 font-medium leading-relaxed italic">
                                    "{{ $ticket->description }}"
                                </p>
                                <div class="flex items-center mt-3 text-[9px] font-black text-slate-600 uppercase tracking-widest">
                                    <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Reported {{ $ticket->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </td>

                        <td class="px-8 py-8 text-center">
                            @php
                                $statusClasses = [
                                    'Open' => 'bg-rose-500/10 text-rose-500 border-rose-500/20',
                                    'In Progress' => 'bg-amber-500/10 text-amber-500 border-amber-500/20',
                                    'Resolved' => 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20'
                                ];
                            @endphp
                            <span class="px-4 py-2 rounded-xl text-[10px] font-black uppercase border tracking-widest {{ $statusClasses[$ticket->status] }}">
                                {{ $ticket->status }}
                            </span>
                        </td>

                        <td class="px-8 py-8">
                            <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" class="flex flex-col space-y-3 items-end">
                                @csrf
                                @method('PATCH')
                                
                                <div class="flex space-x-2 w-full max-w-[280px]">
                                    <select name="status" class="flex-1 bg-white/5 border border-white/10 text-white text-[11px] font-bold rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 py-2.5 px-3 outline-none transition-all">
                                        <option value="Open" class="bg-slate-900" {{ $ticket->status == 'Open' ? 'selected' : '' }}>Open</option>
                                        <option value="In Progress" class="bg-slate-900" {{ $ticket->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Resolved" class="bg-slate-900" {{ $ticket->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                    </select>
                                </div>

                                <div class="w-full max-w-[280px]">
                                    <input type="text" name="admin_note" value="{{ $ticket->admin_note }}" 
                                           placeholder="Enter technician log..." 
                                           class="w-full bg-white/5 border border-white/10 text-white text-[11px] font-medium rounded-xl focus:bg-white/10 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 py-2.5 px-3 outline-none transition-all placeholder-slate-600">
                                </div>

                                <button type="submit" class="w-full max-w-[280px] bg-indigo-600 hover:bg-indigo-500 text-white text-[10px] font-black uppercase tracking-[0.2em] py-3.5 rounded-xl shadow-xl shadow-indigo-500/10 transform transition active:scale-95">
                                    Commit Update
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($tickets->isEmpty())
            <div class="py-32 text-center bg-white/[0.01]">
                <div class="w-20 h-20 bg-white/5 rounded-[2.5rem] flex items-center justify-center mx-auto mb-6 border border-white/10">
                    <svg class="w-8 h-8 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <p class="text-slate-500 font-black uppercase tracking-[0.3em] text-[10px] italic italic">All Systems Operational. No Threats Detected.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection