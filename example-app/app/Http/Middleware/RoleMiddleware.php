<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. Check karein ke user login hai ya nahi
        if (!auth()->check()) {
            return redirect('login');
        }

        // 2. User ka role check karein
        // Hum check kar rahe hain ke kya user ka role (student/staff/faculty) 
        // wahi hai jo humne route par define kiya hai?
        if (auth()->user()->role !== $role) {
            
            // Agar role match nahi karta, to error message ke saath redirect karein
            return redirect('/')->with('error', 'Aapko is section ki ijazat nahi hai.');
        }

        return $next($request);
    }
}