<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PerumahanController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query();

        // Filter Jenis
        if ($request->filled('Jenis')) {
            $jenis = $request->Jenis;

            if ($jenis == 'Subsidi') {
                $query->where('subsidi_unit', '>', 0);
            } elseif ($jenis == 'Menengah') {
                $query->where('menengah_unit', '>', 0);
            } elseif ($jenis == 'Premium') {
                $query->where('premium_unit', '>', 0);
            }
        }

        // Filter Kota
        if ($request->filled('kota')) {
            $query->where(
                'location',
                'Ilike',
                '%' . trim($request->kota) . '%'
            );
        }

        // Filter Kecamatan
        if ($request->filled('kecamatan')) {
            $query->where(
                'location',
                'Ilike',
                '%' . trim($request->kecamatan) . '%'
            );
        }

        // Filter Developer
        if ($request->filled('developer')) {
            $query->where(
                'developer',
                'Ilike',
                '%' . trim($request->developer) . '%'
            );
        }

        // Search dari Search Box Navbar
        // Search dari Search Box Navbar
        if ($request->filled('search')) {

            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('location', 'Ilike', '%' . $search . '%')
                    ->orWhere('developer', 'Ilike', '%' . $search . '%');
            });
        }
        // hasil pencarian
        $properties = $query->get();

        // Kirim data ke halaman katalog
        return view('properties.index', compact('properties'));
    }
}
