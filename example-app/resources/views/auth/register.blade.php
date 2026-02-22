<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Lab Support Portal</title>
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
            padding: 20px;
        }

        .glass-box {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border-radius: 2.5rem;
            width: 100%;
            max-width: 500px;
            padding: 2.5rem;
            position: relative;
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
        }

        .btn-shine:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.5);
        }

        .glow-1 { position: absolute; width: 300px; height: 300px; background: #4f46e5; filter: blur(120px); opacity: 0.15; top: -50px; left: -50px; z-index: -1; }
    </style>
</head>
<body>

    <div class="glow-1"></div>

    <div class="glass-box">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-600/20 border border-indigo-500/30 mb-4">
                <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-black text-white tracking-tight">Create <span class="text-indigo-500">Account</span></h1>
            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.3em] mt-1">Join the Lab Support Network</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus 
                    class="custom-input w-full px-5 py-3.5 rounded-2xl text-sm font-medium" 
                    placeholder="Enter your name">
                @if($errors->has('name'))
                    <span class="text-rose-500 text-[10px] mt-1 block font-bold italic">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">University Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                    class="custom-input w-full px-5 py-3.5 rounded-2xl text-sm font-medium" 
                    placeholder="student@university.edu">
                @if($errors->has('email'))
                    <span class="text-rose-500 text-[10px] mt-1 block font-bold italic">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Password</label>
                    <input type="password" name="password" required 
                        class="custom-input w-full px-5 py-3.5 rounded-2xl text-sm font-medium" 
                        placeholder="••••••••">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Confirm</label>
                    <input type="password" name="password_confirmation" required 
                        class="custom-input w-full px-5 py-3.5 rounded-2xl text-sm font-medium" 
                        placeholder="••••••••">
                </div>
            </div>
            @if($errors->has('password'))
                <span class="text-rose-500 text-[10px] mt-1 block font-bold italic">{{ $errors->first('password') }}</span>
            @endif

            <div class="pt-4 space-y-4">
                <button type="submit" class="btn-shine w-full py-4 rounded-2xl text-white text-xs font-black uppercase tracking-[0.2em] shadow-lg">
                    Register Identity
                </button>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-[10px] font-black text-slate-500 hover:text-indigo-400 uppercase tracking-widest transition-colors">
                        Already have an account? <span class="text-indigo-500">Log In</span>
                    </a>
                </div>
            </div>
        </form>
    </div>

</body>
</html>