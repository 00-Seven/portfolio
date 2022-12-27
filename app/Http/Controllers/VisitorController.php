<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function report(Request $request) {

        $current_time = now()->subHour(1)->toDateTimeString();
        $total_visitors = Visitor::where('updated_at','>',$current_time)->count();
        $public_visitors = Visitor::whereNull('user_id')->where('updated_at','>',$current_time)->count();
        $private_visitors = $total_visitors - $public_visitors;
        return [
            'total_visitors' => $total_visitors,
            'public_visitors' => $public_visitors,
            'private_visitors' => $private_visitors,
        ];
    }
}
