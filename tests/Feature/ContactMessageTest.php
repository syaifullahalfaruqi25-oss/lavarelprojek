<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ContactMessageTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone', 30);
            $table->string('subject');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function test_contact_message_is_stored_and_confirmation_is_shown(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Budi Santoso',
            'phone' => '081234567890',
            'email' => 'budi@example.com',
            'subject' => 'Informasi perumahan',
            'message' => 'Mohon informasi lebih lanjut.',
        ]);

        $response
            ->assertRedirect(route('contact.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Budi Santoso',
            'phone' => '081234567890',
            'email' => 'budi@example.com',
            'subject' => 'Informasi perumahan',
            'message' => 'Mohon informasi lebih lanjut.',
            'is_read' => false,
        ]);
    }

    public function test_contact_form_validation_returns_field_errors(): void
    {
        $response = $this->from(route('contact.index'))
            ->post(route('contact.store'), [
                'name' => '',
                'phone' => '',
                'email' => 'alamat-tidak-valid',
                'subject' => '',
                'message' => '',
            ]);

        $response
            ->assertRedirect(route('contact.index'))
            ->assertSessionHasErrors(['name', 'phone', 'email', 'subject', 'message']);
    }

    public function test_honeypot_submission_is_rejected(): void
    {
        $this->post(route('contact.store'), [
            'website' => 'spam.example',
        ])->assertUnprocessable();
    }
}
