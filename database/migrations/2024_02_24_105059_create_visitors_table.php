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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('gender');
            $table->string('mobilenumber');
            $table->string('cnic_number', 15)->unique();
            $table->string('address1');
            $table->string('address2');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('visitor_categories')->onDelete('cascade');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('visitee');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->string('status')->nullable();
            $table->string('entryStatus')->nullable();
            $table->longText('purpose');
            $table->string('image');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
