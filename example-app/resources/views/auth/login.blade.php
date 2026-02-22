<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Lab Support Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top right, #1e1b4b, #0f172a);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .glass-box {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border-radius: 2.5rem;
            width: 100%;
            max-width: 420px;
            padding: 3rem 2rem;
            position: relative;
        }

        .glass-box::before {
            content: '';
            position: absolute;
            top: -2px; left: -2px; right: -2px; bottom: -2px;
            background: linear-gradient(45deg, transparent, rgba(99, 102, 241, 0.3), transparent);
            border-radius: 2.5rem;
            z-index: -1;
        }

        .custom-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .custom-input:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #6366f1;
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.2);
            outline: none;
        }

        .btn-shine {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-shine:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.5);
        }

        /* Ambient Glow Background Objects */
        .glow-1 { position: absolute; width: 300px; height: 300px; background: #4f46e5; filter: blur(120px); opacity: 0.2; top: -100px; left: -100px; }
        .glow-2 { position: absolute; width: 300px; height: 300px; background: #9333ea; filter: blur(120px); opacity: 0.2; bottom: -100px; right: -100px; }
    </style>
</head>
<body>

    <div class="glow-1"></div>
    <div class="glow-2"></div>

    <div class="glass-box">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-indigo-600/20 border border-indigo-500/30 mb-4">
                <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A10.003 10.003 0 0014 3c1.268 0 2.39.341 3.44 2.04m-3.44 2.04l.054-.09A10.003 10.003 0 0121 11c0 2.507-.912 4.801-2.422 6.571M12 11V3"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-black text-white tracking-tight">Lab<span class="text-indigo-500">Squad</span></h1>
            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.3em] mt-2 italic">Centralized Management System</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div class="relative">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Identity (Email)</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                    class="custom-input w-full px-5 py-4 rounded-2xl text-sm font-medium" 
                    placeholder="name@university.edu">
                @if($errors->has('email'))
                    <span class="text-rose-500 text-[10px] mt-1 ml-1 font-bold italic">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="relative">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Access Key</label>
                <input type="password" name="password" required 
                    class="custom-input w-full px-5 py-4 rounded-2xl text-sm font-medium" 
                    placeholder="••••••••">
                @if($errors->has('password'))
                    <span class="text-rose-500 text-[10px] mt-1 ml-1 font-bold italic">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="flex items-center justify-between px-1">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-700 bg-slate-800 text-indigo-600 focus:ring-0">
                    <span class="ml-2 text-[10px] font-bold text-slate-500 uppercase italic">Stay logged in</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-[10px] font-black text-indigo-400 hover:text-indigo-300 uppercase transition-colors">Recover Key?</a>
                @endif
            </div>

            <button type="submit" class="btn-shine w-full py-4 rounded-2xl text-white text-xs font-black uppercase tracking-[0.2em] shadow-lg">
                Authenticate Access
            </button>

            <p class="text-center text-[9px] text-slate-600 font-bold uppercase tracking-widest mt-6">
                Internal Lab Network Security Protocol v2.6
            </p>
        </form>
        <div class="text-center">
                    <a href="{{ route('register') }}" class="text-[10px] font-black text-slate-500 hover:text-indigo-400 uppercase tracking-widest transition-colors">
                        Add your new account? <span class="text-indigo-500">Sign Up</span>
                    </a>
                </div>
    </div>

</body>
</html>