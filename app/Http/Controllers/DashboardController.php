<?php

namespace App\Http\Controllers;

use App\Services\SubjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return redirect(route('login'));
        }
        return redirect(route('dashboard'));
    }

    public function dashboard(SubjectService $subjectService)
    {
        $data = [];
        $data['subjects'] = $subjectService->fetchSubjects();
        return view('dashboard', $data);
    }
}
