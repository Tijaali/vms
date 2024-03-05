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
        Schema::create('security_officers', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('name');
            $table->string('gender');
            $table->string('mobilenumber');
            $table->string('cnic_number', 15)->unique();
            $table->string('address1');
            $table->string('address2');
            $table->string('image');
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('visitor_categories')->onDelete('cascade');
            // $table->unsignedBigInteger('department_id')->nullable();
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_officers');
    }
};
