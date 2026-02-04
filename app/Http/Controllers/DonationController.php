<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1'
        ]);

        $campaign = Campaign::findOrFail($id);

        if ($campaign->current_amount + $request->amount > $campaign->target_amount) {
            return response()->json([
                'message' => 'Target kampanye terlampaui'
            ], 400);
        }

        Donation::create([
            'campaign_id' => $campaign->id,
            'amount' => $request->amount
        ]);

        $campaign->increment('current_amount', $request->amount);

        return response()->json([
            'message' => 'Donasi berhasil'
        ]);
    }
}

