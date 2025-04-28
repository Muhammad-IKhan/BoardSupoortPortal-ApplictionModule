<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('head_id')->constrained()->onDelete('cascade');
            $table->string('apply_for')->nullable();
            $table->foreignId('basic_info_breakdowns')->constrained()->onDelete('cascade');
            $table->integer('owed_amount')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('receipts');
    }
};