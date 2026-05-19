<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('path', 2048);
            $table->string('ip_hash', 64)->nullable();
            $table->string('user_agent', 1024)->nullable();
            $table->string('referer', 2048)->nullable();
            $table->string('session_id', 64)->nullable();
            $table->string('country', 2)->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->index('created_at');
            $table->index('session_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
