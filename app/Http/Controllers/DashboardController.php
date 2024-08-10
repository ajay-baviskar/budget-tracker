<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', auth()->id())->sum('amount');
        $expenses = Expense::where('user_id', auth()->id())->sum('amount');
        $balance = $incomes - $expenses;

        return view('dashboard.home', compact('incomes', 'expenses', 'balance'));
        // return view('home', compact('incomes', 'expenses', 'balance'));

    }

    public function monthlyReport(Request $request)
    {
        $month = $request->input('month', now()->format('Y-m'));
        $incomes = Income::where('user_id', auth()->id())
                         ->whereBetween('date', [$month . '-01', $month . '-31'])
                         ->sum('amount');
        $expenses = Expense::where('user_id', auth()->id())
                           ->whereBetween('date', [$month . '-01', $month . '-31'])
                           ->sum('amount');
        $balance = $incomes - $expenses;

        return view('dashboard.monthly_report', compact('incomes', 'expenses', 'balance', 'month'));
    }
}
