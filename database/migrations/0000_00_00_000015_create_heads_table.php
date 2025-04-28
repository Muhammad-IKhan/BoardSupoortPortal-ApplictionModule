<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('heads', function (Blueprint $table) {
            $table->id();
            $table->integer('head_code');
            $table->string('head_name')->unique();
            $table->integer('head_service_fee');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('heads');
    }
};