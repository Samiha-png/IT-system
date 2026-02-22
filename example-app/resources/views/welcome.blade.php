@extends('layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-8 pt-16 pb-24 flex flex-col items-center text-center">
        <div class="inline-block px-4 py-1.5 mb-6 rounded-full bg-indigo-500/10 border border-indigo-500/20">
            <span class="text-[10px] font-black uppercase tracking-[0.3em] text-indigo-400 animate-pulse">System Status: Operational</span>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-black mb-8 leading-tight text-white">
            Smart Solutions for <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400">Modern Laboratories.</span>
        </h1>
        
        <p class="text-slate-400 max-w-2xl text-lg mb-12 font-medium leading-relaxed">
            LabSquad aik automated bridge hai jo students, faculty, aur network technicians ko connect karta hai. 
            <span class="text-indigo-400">IP-based tracking</span> ke zariye masail ka fori hal aur real-time monitoring ab aik click door hai.
        </p>

        <div class="flex flex-col sm:flex-row gap-6">
            @auth
                <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : (Auth::user()->role === 'faculty' ? route('faculty.dashboard') : route('dashboard')) }}" 
                   class="px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-sm transition-all hover:scale-105 bg-indigo-600 shadow-xl shadow-indigo-500/25 text-white">
                    Enter Command Center
                </a>
            @else
                <a href="{{ route('login') }}" class="px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-sm transition-all hover:scale-105 bg-indigo-600 shadow-xl shadow-indigo-500/25 text-white">
                    Get Started Now
                </a>
                <a href="#how-it-works" class="px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-sm transition-all border border-white/10 text-white hover:bg-white/5">
                    Learn More
                </a>
            @endauth
        </div>
    </section>

    <section id="how-it-works" class="max-w-7xl mx-auto px-8 pb-32">
        <div class="text-center mb-16">
            <h2 class="text-xs font-black text-indigo-500 uppercase tracking-[0.5em] mb-4">Our Ecosystem</h2>
            <p class="text-3xl font-black text-white italic">One Platform. Three Perspectives.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-card group p-10 border border-white/5 hover:border-indigo-500/40 transition-all duration-500 relative overflow-hidden">
                <div class="absolute -right-8 -top-8 w-24 h-24 bg-indigo-600/10 rounded-full blur-2xl group-hover:bg-indigo-600/20 transition-all"></div>
                <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center text-indigo-400 mb-6 border border-indigo-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-xl font-black mb-4 text-white uppercase tracking-tighter italic">Students</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    System hardware ya software mein masla? Lab mein baithay baithay apni IP ke sath shikayat darj karein. Apni purani reports aur unka live status dashboard par check karein.
                </p>
            </div>

            <div class="glass-card group p-10 border border-white/5 hover:border-purple-500/40 transition-all duration-500 relative overflow-hidden">
                <div class="absolute -right-8 -top-8 w-24 h-24 bg-purple-600/10 rounded-full blur-2xl group-hover:bg-purple-600/20 transition-all"></div>
                <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center text-purple-400 mb-6 border border-purple-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h3 class="text-xl font-black mb-4 text-white uppercase tracking-tighter italic">Faculty</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Poori lab ki health report ek nazar mein. Dekhein kitne systems active hain aur Network Team kitni jaldi masail hal kar rahi hai. Lab management ab hassle-free hai.
                </p>
            </div>

            <div class="glass-card group p-10 border border-white/5 hover:border-emerald-500/40 transition-all duration-500 relative overflow-hidden">
                <div class="absolute -right-8 -top-8 w-24 h-24 bg-emerald-600/10 rounded-full blur-2xl group-hover:bg-emerald-600/20 transition-all"></div>
                <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center text-emerald-400 mb-6 border border-emerald-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-black mb-4 text-white uppercase tracking-tighter italic">NetSquad</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Tickets receive karein, status update karein aur resolution notes add karein. Manual paperwork khatam—ab har issue tracked aur documented hai.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-8 pb-32">
        <div class="bg-gradient-to-br from-indigo-900/40 to-slate-900/40 border border-white/10 rounded-[3rem] p-12 text-center backdrop-blur-md">
            <h2 class="text-3xl font-black text-white mb-6 uppercase italic">Ready to optimize your workflow?</h2>
            <p class="text-slate-400 mb-10 max-w-xl mx-auto font-medium">LabSquad brings efficiency to technical support. Join the portal today.</p>
            <div class="flex justify-center space-x-4 italic font-black text-[10px] tracking-widest text-indigo-500 uppercase">
                <span>Real-time tracking</span>
                <span class="text-slate-700">•</span>
                <span>Role Based access</span>
                <span class="text-slate-700">•</span>
                <span>Cloud Logs</span>
            </div>
        </div>
    </section>
@endsection