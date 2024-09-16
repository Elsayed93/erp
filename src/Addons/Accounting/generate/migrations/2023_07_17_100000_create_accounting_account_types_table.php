<?php

use Obelaw\Framework\Base\MigrationBase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'accounting_account_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_type')->nullable()->constrained($this->prefix . 'accounting_account_types')->cascadeOnDelete();
            $table->string('name');
            $table->enum('nature', ['debit', 'credit'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'accounting_account_types');
    }
};
