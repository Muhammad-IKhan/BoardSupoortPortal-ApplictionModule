<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('basic_info_breakdowns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('head_id')->constrained()->onDelete('cascade');
            $table->string('app_details1')->nullable();
            $table->string('app_details2')->nullable();
            $table->string('app_details3')->nullable();
            $table->integer('custom_amount')->nullable();
            $table->integer('doc_numbers')->nullable();
            $table->integer('paper_numbers')->nullable();
            $table->integer('payable')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('basic_info_breakdowns');
    }
};