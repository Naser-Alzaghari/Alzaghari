<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 191)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10)->nullable();
            $table->decimal('price_after_discount', 10)->nullable();
            $table->integer('stock')->nullable();
            $table->integer('category_id')->nullable()->index('category_id');
            $table->string('video')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
