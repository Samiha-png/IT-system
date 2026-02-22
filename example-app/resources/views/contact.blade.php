@extends('layouts.app')

@section('header')
    Technical Support Hub
@endsection

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4">
        <div class="text-center mb-16">
            <h2 class="text-indigo-500 text-[10px] font-black uppercase tracking-[0.5em] mb-4">Get in Touch</h2>
            <h1 class="text-5xl font-black text-white italic">How Can We <span class="text-indigo-400">Help?</span></h1>
            <p class="mt-4 text-slate-400 font-medium">Koi technical masla ho ya system ke bare mein sawal, hamari team haazir hai.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="space-y-6">
                <div class="glass-card p-8 border-l-4 border-indigo-500">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-10 h-10 bg-indigo-500/20 rounded-xl flex items-center justify-center text-indigo-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-black text-white">IT Headquarters</h3>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Main Lab Complex, Block C, <br>
                        Floor 2, Room 204.
                    </p>
                </div>

                <div class="glass-card p-8 border-l-4 border-purple-500">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-10 h-10 bg-purple-500/20 rounded-xl flex items-center justify-center text-purple-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-black text-white">Office Hours</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs font-bold">
                            <span class="text-slate-500 uppercase">Mon - Fri</span>
                            <span class="text-white text-right">08:00 AM - 05:00 PM</span>
                        </div>
                        <div class="flex justify-between text-xs font-bold">
                            <span class="text-slate-500 uppercase">Saturday</span>
                            <span class="text-white text-right">09:00 AM - 01:00 PM</span>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-8 border-l-4 border-pink-500">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-10 h-10 bg-pink-500/20 rounded-xl flex items-center justify-center text-pink-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-black text-white">Direct Email</h3>
                    </div>
                    <p class="text-indigo-400 text-sm font-black tracking-wider">support@labsquad.edu</p>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white/5 backdrop-blur-2xl border border-white/10 rounded-[2.5rem] p-10 relative overflow-hidden">
                    <div class="relative z-10">
                        <h2 class="text-2xl font-black text-white mb-8">Send a Quick Message</h2>
                        
                        <form action="#" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Full Name</label>
                                <input type="text" placeholder="e.g. Ali Khan" class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-sm text-white focus:outline-none focus:border-indigo-500 transition-all">
                            </div>
                            
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Student ID / Faculty ID</label>
                                <input type="text" placeholder="e.g. 2024-CS-001" class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-sm text-white focus:outline-none focus:border-indigo-500 transition-all">
                            </div>

                            <div class="md:col-span-2 space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Subject</label>
                                <select class="w-full bg-[#161e31] border border-white/10 rounded-2xl p-4 text-sm text-white focus:outline-none focus:border-indigo-500 transition-all appearance-none">
                                    <option>System Hardware Issue</option>
                                    <option>Login / Authentication Problem</option>
                                    <option>Network Connectivity</option>
                                    <option>Feature Suggestion</option>
                                    <option>Other</option>
                                </select>
                            </div>

                            <div class="md:col-span-2 space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Detailed Description</label>
                                <textarea placeholder="Describe your problem clearly..." class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-sm text-white h-32 focus:outline-none focus:border-indigo-500 transition-all"></textarea>
                            </div>

                            <div class="md:col-span-2">
                                <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 py-4 rounded-2xl text-xs font-black uppercase tracking-[0.2em] text-white hover:scale-[1.02] transition-all shadow-xl shadow-indigo-500/20">
                                    Dispatch Message
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="absolute bottom-0 right-0 w-32 h-32 bg-indigo-500/10 blur-3xl rounded-full"></div>
                </div>
            </div>

        </div>
    </div>
@endsection