<?php
namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;

class LogoutController extends RoutingController
{
    function logout() {
        Auth::logout();
        return redirect("/");
    }
}
