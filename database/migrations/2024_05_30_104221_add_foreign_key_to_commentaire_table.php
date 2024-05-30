<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $Table->unsignedBigInteger('article-id');
            $Table->foreign('article_id')->references('id')->on('article');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->DropForeign('commentaires_article_id_foreign');
            $table->dropcolumn('article_id');
        });
    }
};
