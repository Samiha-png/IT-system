@extends('layouts.app')

@section('header')
    Lab Oversight & Analytics
@endsection

@section('content')
<div class="space-y-10">
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="glass-card p-6 border-l-4 border-indigo-500 hover:bg-white/5 transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-indigo-500/10 rounded-2xl flex items-center justify-center text-indigo-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <span class="text-[10px] font-black text-indigo-500/50 uppercase tracking-widest">Global</span>
            </div>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Total Tickets</p>
            <p class="text-4xl font-black text-white mt-1">{{ $stats['total'] }}</p>
        </div>

        <div class="glass-card p-6 border-l-4 border-rose-500 hover:bg-white/5 transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-rose-500/10 rounded-2xl flex items-center justify-center text-rose-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-rose-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-rose-500"></span>
                </div>
            </div>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Open / Urgent</p>
            <p class="text-4xl font-black text-white mt-1">{{ $stats['open'] }}</p>
        </div>

        <div class="glass-card p-6 border-l-4 border-amber-500 hover:bg-white/5 transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-amber-500/10 rounded-2xl flex items-center justify-center text-amber-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
            </div>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Processing</p>
            <p class="text-4xl font-black text-white mt-1">{{ $stats['progress'] }}</p>
        </div>

        <div class="glass-card p-6 border-l-4 border-emerald-500 hover:bg-white/5 transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-emerald-500/10 rounded-2xl flex items-center justify-center text-emerald-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
            </div>
            <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Resolved Today</p>
            <p class="text-4xl font-black text-white mt-1">{{ $stats['resolved'] }}</p>
        </div>
    </div>

    <div class="glass-card overflow-hidden">
        <div class="px-8 py-6 border-b border-white/5 flex justify-between items-center bg-white/5">
            <h3 class="text-lg font-black text-white uppercase italic tracking-tighter">Live Lab Activity Feed</h3>
            <div class="flex items-center space-x-3">
                <div class="flex items-center space-x-2 bg-emerald-500/10 px-3 py-1 rounded-full border border-emerald-500/20">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span class="text-[9px] font-black text-emerald-500 uppercase tracking-widest">Network Live</span>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white/5">
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Student Info</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest">Complaint Snapshot</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Current Status</th>
                        <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Technical Logs</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($tickets as $ticket)
                    <tr class="hover:bg-white/5 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center text-white text-[10px] font-black shadow-lg shadow-indigo-500/20">
                                    ID
                                </div>
                                <div>
                                    <p class="text-sm font-black text-white group-hover:text-indigo-400 transition">{{ $ticket->user->name }}</p>
                                    <p class="text-[10px] font-mono text-slate-500 mt-0.5 tracking-tighter">{{ $ticket->ip_address }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-8 py-6">
                            <p class="text-xs text-slate-400 font-medium leading-relaxed max-w-[280px] italic">
                                "{{ Str::limit($ticket->description, 80) }}"
                            </p>
                            <p class="text-[9px] font-black text-indigo-500/60 mt-2 uppercase tracking-widest">
                                Logged {{ $ticket->created_at->diffForHumans() }}
                            </p>
                        </td>

                        <td class="px-8 py-6 text-center">
                            @php
                                $badgeColor = [
                                    'Open' => 'bg-rose-500/10 text-rose-500 border-rose-500/20',
                                    'In Progress' => 'bg-amber-500/10 text-amber-500 border-amber-500/20',
                                    'Resolved' => 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20',
                                ];
                            @endphp
                            <span class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest border {{ $badgeColor[$ticket->status] ?? 'bg-white/5 text-slate-400 border-white/10' }}">
                                {{ $ticket->status }}
                            </span>
                        </td>

                        <td class="px-8 py-6 text-right">
                            @if($ticket->admin_note)
                                <div class="inline-block bg-indigo-500/5 text-[11px] text-slate-300 px-4 py-3 rounded-2xl border border-indigo-500/10 text-left max-w-[220px]">
                                    <span class="font-black text-indigo-400 uppercase text-[8px] block mb-1 tracking-[0.2em]">Resolution:</span>
                                    {{ $ticket->admin_note }}
                                </div>
                            @else
                                <div class="flex flex-col items-end">
                                    <span class="text-[9px] font-black text-slate-600 uppercase tracking-widest italic animate-pulse">Awaiting Staff...</span>
                                    <span class="h-1 w-12 bg-slate-800 rounded-full mt-2"></span>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            @if($tickets->isEmpty())
            <div class="py-24 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/5 mb-4">
                    <svg class="w-8 h-8 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <p class="text-slate-500 font-black uppercase tracking-widest text-xs">No active laboratory alerts at this moment.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection