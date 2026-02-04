<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaigns.index', compact('campaigns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'target_amount' => 'required|numeric|min:1',
        ]);

        Campaign::create([
            'title' => $request->title,
            'description' => $request->description,
            'target_amount' => $request->target_amount,
            'current_amount' => 0,
        ]);

        return redirect('/');
    }
}
