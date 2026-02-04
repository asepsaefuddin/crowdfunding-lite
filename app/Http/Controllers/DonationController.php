<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function donate(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000'
        ], [
            'amount.required' => 'Nominal donasi wajib diisi.',
            'amount.numeric'  => 'Nominal donasi harus berupa angka.',
            'amount.min'      => 'Nominal donasi minimal Rp 1.000.'
        ]);

        $campaign = Campaign::findOrFail($id);

        if ($campaign->current_amount + $request->amount > $campaign->target_amount) {
            return redirect()->back()
                ->with('error', 'Donasi gagal! Total dana akan melebihi target kampanye.');
        }

        Donation::create([
            'campaign_id' => $campaign->id,
            'amount'      => $request->amount,
        ]);

        $campaign->increment('current_amount', $request->amount);

        return redirect()->back()
            ->with('success', 'Terima kasih! Donasi Anda berhasil diproses.');
    }
}
