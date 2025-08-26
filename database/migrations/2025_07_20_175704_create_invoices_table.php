<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('invoices', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // invoice owner
        $table->string('invoice_no')->unique();
        $table->decimal('amount', 10, 2);
        $table->date('invoice_date');
        $table->string('qr_token')->unique()->nullable(); // used to generate the QR code
        $table->boolean('is_redeemed')->default(false);    // true if reward points are already claimed
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
