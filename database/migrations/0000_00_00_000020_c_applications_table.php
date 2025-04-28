<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void 
    {    
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->json('primary_details');
            $table->json('secondary_details');
            $table->json('additional_notes');
            $table->json('additional_notes_2');
            //----------------------------------------------------
            // $table->text('primary_details')->nullable();
            // $table->text('secondary_details')->nullable();
            // $table->text('additional_notes')->nullable();
            // $table->text('additional_notes_2')->nullable();
            //----------------------------------------------------
            // $table->longText('primary_details');
            // $table->longText('secondary_details');
            // $table->longText('additional_notes');
            // $table->longText('additional_notes_2');
            //----------------------------------------------------
            $table->timestamps();
        });
    }
          

    public function down(): void {
        Schema::dropIfExists('applications');
    }
};


