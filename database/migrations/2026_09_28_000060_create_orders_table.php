<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('address_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('order_number', 30)->unique();

            $table->enum('status', [
                'pending',
                'processing',
                'shipped',
                'completed',
                'cancelled'
            ])->default('pending');

            $table->decimal('total_amount', 12, 2)->default(0);

            $table->timestamp('ordered_at')->nullable();

            $table->timestamps();

            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
