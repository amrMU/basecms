<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class Admin
{
	public function handle($request, Closure $next) {
  if (Auth::user()->type_user == "admin") {
    return $next($request);
  } else {
    return redirect("/")->withMyerror("You are not authorized for this action");
  }
}
}