<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('payment_operation_events')) {
            return;
        }

        Schema::table('payment_operation_events', function (Blueprint $table): void {
            $table->string('operation_type', 40)->change();
        });
    }

    public function down(): void
    {
        // Keep the wider column on rollback: existing audit rows may use longer operation types.
    }
};
