<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('admin.campaigns.index', compact('campaigns'));
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
            'current_amount' => 0
        ]);

        return redirect('/admin/campaigns');
    }

    // public function edit($id)
    // {
    //     $campaign = Campaign::findOrFail($id);
    //     return view('admin.campaigns.edit', compact('campaign'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $campaign = Campaign::findOrFail($id);

    //     $campaign->update($request->only('title','description','target_amount'));

    //     return redirect('/admin/campaigns');
    // }

    public function destroy($id)
    {
        Campaign::findOrFail($id)->delete();
        return redirect('/admin/campaigns');
    }
    public function edit($id)
    {
    $campaign = Campaign::findOrFail($id);
    return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'target_amount' => 'required|numeric|min:1',
    ]);

    $campaign = Campaign::findOrFail($id);

    $campaign->update([
        'title' => $request->title,
        'description' => $request->description,
        'target_amount' => $request->target_amount,
    ]);

    return redirect('/admin/campaigns');
    }
    public function create()
    {
    return view('admin.campaigns.create');
    }

}
