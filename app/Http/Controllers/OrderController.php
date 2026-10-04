<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Property;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create($id)
    {
        $property = Property::with(['types', 'units'])->findOrFail($id);

        return view('orders.create', compact('property'));
    }

    public function store(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $data = $request->validate([
            'name'             => 'required|string|max:100',
            'nik'              => 'required|digits:16',
            'phone'            => ['required', 'regex:/^(\+62|62|0)8[0-9]{7,12}$/'],
            'email'            => 'nullable|email|max:100',
            'address'          => 'required|string|max:500',
            'job'              => 'nullable|string|max:100',
            'income'           => 'nullable|integer|min:0',
            'payment_method'   => 'required|in:kpr_subsidi,kpr_komersial,tunai',
            'property_type_id' => 'nullable|exists:property_types,id',
            'unit_code'        => 'nullable|string|max:50',
            'notes'            => 'nullable|string|max:1000',
            'consent'          => 'accepted',
            'website'          => 'nullable|max:0', // honeypot anti-spam
        ], [
            'nik.digits'     => 'NIK harus 16 digit angka.',
            'phone.regex'    => 'Nomor WhatsApp tidak valid (contoh: 081234567890).',
            'consent.accepted' => 'Anda harus menyetujui penggunaan data pribadi.',
        ]);

        if (! empty($data['unit_code'])) {
            $tersedia = $property->units()
                ->where('code', $data['unit_code'])
                ->where('status', 'tersedia')
                ->exists();

            if (! $tersedia) {
                return back()->withErrors(['unit_code' => 'Kavling tersebut tidak tersedia.'])->withInput();
            }
        }

        unset($data['consent'], $data['website']);

        $order = Order::create($data + [
            'property_id' => $property->id,
            'status'      => 'baru',
        ]);

        $order->update(['code' => 'ORD-' . now()->format('Ymd') . '-' . str_pad($order->id, 4, '0', STR_PAD_LEFT)]);

        return redirect()->route('order.success', $order->code);
    }

    public function success($code)
    {
        $order = Order::with('property')->where('code', $code)->firstOrFail();

        return view('orders.success', compact('order'));
    }
}