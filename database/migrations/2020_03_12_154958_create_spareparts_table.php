<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('synonyms')->nullable();
            $table->unsignedBigInteger('manufacturer_id');
            $table->string('image')->nullable();
            // Codes
            $table->string('code', 5)->unique();
            $table->string('vendor_code')->nullable()->default('');
            $table->string('original_code')->nullable()->default('');
            // Prices
            $table->boolean('is_special')->default(false);
            $table->boolean('is_original')->default(false);
            $table->boolean('is_by_order')->default(false);
            //
//            $table->text('description')->nullable();
            // Meta
//            $table->string('slug');
//            $table->string('meta_title');
//            $table->string('meta_description');
            // Yandex Market
//            $table->boolean('market_is_publish')->default(false);
//            $table->string('market_category')->nullable();
//            $table->string('market_image')->nullable();

            $table->timestamps();

            $table->index('manufacturer_id');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('spareparts');
    }
}
