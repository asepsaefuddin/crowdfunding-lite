<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('front.campaigns.index', compact('campaigns'));
    }

    public function donate(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1'
        ]);

        $campaign = Campaign::findOrFail($id);

        if ($campaign->current_amount + $request->amount > $campaign->target_amount) {
            return back()->with('error', 'Target terlampaui');
        }

        Donation::create([
            'campaign_id' => $campaign->id,
            'amount' => $request->amount
        ]);

        $campaign->increment('current_amount', $request->amount);

        return redirect()->back()
            ->with('success', 'Terima kasih! Donasi Anda berhasil diproses.');
    }
}
