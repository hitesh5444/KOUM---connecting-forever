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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('name');
            $table->string('last_name')->after('first_name');
            $table->string('profile_image')->after('email');
            $table->string('about')->after('profile_image');
            $table->string('address')->after('about');
            $table->string('phone')->after('address');
            $table->string('instagram')->after('phone');
            $table->string('facebook')->after('instagram');
            $table->string('twitter')->after('facebook');
            $table->string('linkedin')->after('twitter');
            $table->boolean('term')->comment("1=yes,2=no");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
