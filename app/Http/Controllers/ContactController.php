<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        $contact = Property::query()
            ->where(function ($query) {
                $query->whereNotNull('marketing_address')
                    ->orWhereNotNull('marketing_phone')
                    ->orWhereNotNull('marketing_email')
                    ->orWhereNotNull('marketing_whatsapp');
            })
            ->latest('id')
            ->first([
                'marketing_address',
                'marketing_phone',
                'marketing_email',
                'marketing_whatsapp',
            ]);

        $whatsapp = $contact?->marketing_whatsapp ?: $contact?->marketing_phone;
        $whatsappNumber = preg_replace('/\D+/', '', (string) $whatsapp) ?? '';

        if (str_starts_with($whatsappNumber, '0')) {
            $whatsappNumber = '62' . substr($whatsappNumber, 1);
        }

        return view('contact', compact('contact', 'whatsappNumber'));
    }

    public function store(Request $request): RedirectResponse
    {
        abort_if($request->filled('website'), 422, 'Pengiriman ditolak.');

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
            'phone.string' => 'Nomor WhatsApp harus berupa teks.',
            'phone.max' => 'Nomor WhatsApp tidak boleh lebih dari 30 karakter.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'subject.required' => 'Subjek wajib diisi.',
            'subject.string' => 'Subjek harus berupa teks.',
            'subject.max' => 'Subjek tidak boleh lebih dari 255 karakter.',
            'message.required' => 'Pesan wajib diisi.',
            'message.string' => 'Pesan harus berupa teks.',
            'message.max' => 'Pesan tidak boleh lebih dari 5000 karakter.',
        ]);

        ContactMessage::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        return redirect()
            ->route('contact.index')
            ->with('success', 'Terima kasih, pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}
