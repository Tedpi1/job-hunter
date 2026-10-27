<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();

            // Company that published the vacancy
            $table->foreignId('company_id')
                ->constrained()
                ->cascadeOnDelete();

            // Vacancy details
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('experience_level')->nullable();

            // Application information
            $table->string('application_url');
            $table->timestamp('deadline')->nullable();
            $table->timestamp('published_at')->nullable();

            // Monitoring information
            $table->string('source')->default('company_website');
            $table->string('external_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_seen_at')->nullable();

            $table->timestamps();

            // Prevent the same external vacancy being imported twice
            $table->unique(
                ['company_id', 'external_id'],
                'vacancies_company_external_id_unique'
            );

            $table->index(['company_id', 'is_active']);
            $table->index(['is_active', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
