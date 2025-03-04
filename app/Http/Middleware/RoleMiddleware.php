<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Nếu user là admin, bỏ qua kiểm tra quyền
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return $next($request);
        }

        // Nếu user không có role phù hợp, chặn truy cập
        if (!Auth::check() || !Auth::user()->hasRole($role)) {
            abort(403, 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
}

