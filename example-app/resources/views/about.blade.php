@extends('layouts.app')

@section('header')
    Our Journey & Vision
@endsection

@section('content')
    <div class="py-16 text-center">
        <h2 class="text-indigo-500 text-[10px] font-black uppercase tracking-[0.5em] mb-4">Innovation in Education</h2>
        <h1 class="text-5xl md:text-6xl font-black text-white leading-tight">
            Redefining <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-500">Lab Efficiency.</span>
        </h1>
        <p class="mt-8 text-slate-400 max-w-3xl mx-auto text-lg leading-relaxed">
            LabSquad ka maqsad sirf complaints register karna nahi, balki ek aisa ecosystem banana hai jahan hardware aur software issues parhai mein rukawat na banein. Hum technology ko use karte hain taake aapka focus sirf learning par ho.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24">
        <div class="glass-card p-10 border-t-2 border-indigo-500 hover:bg-white/5 transition">
            <div class="text-indigo-400 mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <h3 class="text-xl font-black text-white mb-2">Real-time Tracking</h3>
            <p class="text-slate-500 text-sm">Har ticket ki live update milti hai, taake aapko baar baar IT office ke chakkar na lagane paren.</p>
        </div>

        <div class="glass-card p-10 border-t-2 border-purple-500 hover:bg-white/5 transition">
            <div class="text-purple-400 mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04 Pel8.618 11.054a11.955 11.955 0 01-1.2 4.9c0 4.591 3.25 8.423 7.618 9.34a11.955 11.955 0 017.618-9.34 11.955 11.955 0 01-1.2-4.9z"></path></svg>
            </div>
            <h3 class="text-xl font-black text-white mb-2">Automated IP Logs</h3>
            <p class="text-slate-500 text-sm">System khud ba khud aapki PC details detect karta hai, jis se resolution time 50% tak kam ho jata hai.</p>
        </div>

        <div class="glass-card p-10 border-t-2 border-pink-500 hover:bg-white/5 transition">
            <div class="text-pink-400 mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h3 class="text-xl font-black text-white mb-2">Collaborative Environment</h3>
            <p class="text-slate-500 text-sm">Faculty aur IT team ek hi platform par kaam karte hain behtar coordination ke liye.</p>
        </div>
    </div>

    <div class="bg-white/5 rounded-[3rem] p-12 border border-white/10 mb-20 overflow-hidden relative">
        <div class="relative z-10 flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <h2 class="text-3xl font-black text-white mb-6 italic">Hamara Maqsad (Goal)</h2>
                <p class="text-slate-400 leading-relaxed mb-6 font-medium">
                    "Hamara target ye hai ke kisi bhi computer lab mein technical masla 15 minutes se zyada na rahay. Humne is portal ko is tarah design kiya hai ke har report fori taur par relevant technician ke mobile par notification bhejti hai."
                </p>
                <ul class="space-y-4">
                    <li class="flex items-center text-sm text-slate-300 font-bold">
                        <span class="w-6 h-6 rounded-full bg-indigo-500/20 flex items-center justify-center mr-3 text-indigo-400 italic">✓</span>
                        Manual Paper Work ka Khatma
                    </li>
                    <li class="flex items-center text-sm text-slate-300 font-bold">
                        <span class="w-6 h-6 rounded-full bg-indigo-500/20 flex items-center justify-center mr-3 text-indigo-400 italic">✓</span>
                        Transparent Resolution System
                    </li>
                </ul>
            </div>
            <div class="md:w-1/2">
                <div class="rounded-2xl border border-indigo-500/30 p-2 bg-indigo-500/5">
                    <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&q=80&w=800" class="rounded-xl opacity-80" alt="Tech Solution">
                </div>
            </div>
        </div>
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-600/10 rounded-full blur-3xl"></div>
    </div>

    <div class="text-center py-10">
        <h3 class="text-white font-black text-2xl mb-6">Need technical help right now?</h3>
        <a href="{{ url('/contact') }}" class="inline-block px-8 py-4 bg-white text-slate-900 font-black uppercase tracking-widest text-[10px] rounded-full hover:bg-indigo-400 hover:text-white transition-all">
            Contact Support
        </a>
    </div>
@endsection