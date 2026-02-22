<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LabSquad') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0f172a;
            color: white;
            overflow-x: hidden;
        }
        .main-gradient {
            background: radial-gradient(circle at top right, #1e1b4b, #0f172a);
            min-height: 100vh;
        }
        .glass-nav {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1.5rem;
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #4f46e5; }
    </style>
</head>
<body class="antialiased">
    <div class="main-gradient">
        
        <nav class="glass-nav sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/40 group-hover:rotate-12 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <span class="text-xl font-black tracking-tighter uppercase italic">Lab<span class="text-indigo-400">Squad</span></span>
                        </a>
                    </div>

                    <div class="flex items-center space-x-8">
                        <div class="hidden md:flex space-x-8 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                            <a href="{{ url('/about') }}" class="hover:text-indigo-400 transition">About</a>
                            <a href="{{ url('/contact') }}" class="hover:text-indigo-400 transition">Contact</a>
                        </div>

                        @auth
                            <div class="flex items-center pl-8 border-l border-white/10 space-x-5">
                                <div class="text-right hidden sm:block">
                                    <a href="{{ 
                                        Auth::user()->role === 'admin' ? route('admin.dashboard') : 
                                        (Auth::user()->role === 'faculty' ? route('faculty.dashboard') : route('dashboard')) 
                                       }}" 
                                       class="group block transition-all duration-300">
                                        <p class="text-xs font-black text-white leading-none group-hover:text-indigo-400 transition-colors">
                                            {{ Auth::user()->name }}
                                        </p>
                                        <p class="text-[9px] font-bold text-indigo-400 uppercase tracking-tighter italic flex items-center justify-end mt-1">
                                            Go to Dashboard
                                            <svg class="w-2 h-2 ml-1 opacity-0 group-hover:opacity-100 transition-all transform translate-x-[-5px] group-hover:translate-x-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                            </svg>
                                        </p>
                                    </a>
                                </div>
                                
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="p-2.5 rounded-xl bg-white/5 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-all border border-white/5 group" title="Secure Logout">
                                        <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="flex items-center pl-8 border-l border-white/10 space-x-6">
                                <a href="{{ route('login') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-white transition">
                                    Login
                                </a>
                                <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white text-[10px] font-black uppercase tracking-widest transition-all shadow-lg shadow-indigo-500/25 active:scale-95">
                                    Get Started
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        @if(View::hasSection('header'))
            <header class="py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="glass-card p-10 border-l-4 border-indigo-500 relative overflow-hidden">
                        <div class="absolute right-0 top-0 w-64 h-64 bg-indigo-600/5 rounded-full blur-3xl -mr-32 -mt-32"></div>
                        <h2 class="text-3xl font-black text-white tracking-tight uppercase italic relative z-10">
                            @yield('header')
                        </h2>
                    </div>
                </div>
            </header>
        @endif

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[60vh]">
            @yield('content')
        </main>

        <footer class="mt-20 border-t border-white/5 bg-slate-950/50 backdrop-blur-xl">
            <div class="max-w-7xl mx-auto px-8 py-16">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-16 items-start">
                    
                    <div class="space-y-6 text-center md:text-left">
                        <div class="flex items-center justify-center md:justify-start space-x-2">
                            <div class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></div>
                            <span class="text-xl font-black tracking-tighter uppercase italic text-white">
                                Lab<span class="text-indigo-500">Squad</span>
                            </span>
                        </div>
                        <p class="text-[11px] font-medium text-slate-500 leading-relaxed max-w-[250px] mx-auto md:mx-0">
                            Next-generation laboratory maintenance portal. Streamlining technical support with real-time tracking and automated reporting.
                        </p>
                    </div>

                    <div class="flex justify-center space-x-12">
                        <div class="flex flex-col space-y-4">
                            <span class="text-[9px] font-black text-slate-700 uppercase tracking-[0.4em] mb-2">Platform</span>
                            <a href="{{ url('/about') }}" class="text-[10px] font-bold text-slate-400 hover:text-indigo-400 transition-all uppercase tracking-widest">Our Mission</a>
                            <a href="{{ url('/contact') }}" class="text-[10px] font-bold text-slate-400 hover:text-indigo-400 transition-all uppercase tracking-widest">Support</a>
                        </div>
                        <div class="flex flex-col space-y-4">
                            <span class="text-[9px] font-black text-slate-700 uppercase tracking-[0.4em] mb-2">Policy</span>
                            <a href="#" class="text-[10px] font-bold text-slate-400 hover:text-white transition-all uppercase tracking-widest">Privacy</a>
                            <a href="#" class="text-[10px] font-bold text-slate-400 hover:text-white transition-all uppercase tracking-widest">Terms</a>
                        </div>
                    </div>

                    <div class="text-center md:text-right space-y-4">
                        <p class="text-[10px] font-black text-slate-600 uppercase tracking-[0.4em]">
                            &copy; {{ date('Y') }} LabSquad Systems
                        </p>
                        <p class="text-[9px] font-bold text-indigo-500/50 uppercase tracking-tighter italic">
                            Operational Excellence • Real-time Monitoring
                        </p>
                        <div class="flex justify-center md:justify-end space-x-4 mt-6">
                            <div class="w-8 h-8 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-indigo-500/20 transition-all cursor-pointer group">
                                <svg class="w-4 h-4 text-slate-500 group-hover:text-indigo-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                            </div>
                            <div class="w-8 h-8 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 transition-all cursor-pointer group">
                                <svg class="w-4 h-4 text-slate-500 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.042-1.416-4.042-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>
</body>
</html>
