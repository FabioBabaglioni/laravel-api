<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // relazione una a molti 
        Schema::table('movies', function (Blueprint $table) {
            $table -> foreignId('genre_id')
                   -> constrained();
        });

        // relazione molti a molti
        Schema::table('movie_tag', function (Blueprint $table) {
            $table -> foreignId('movie_id')
                   -> constrained();

            $table -> foreignId('tag_id')
                   -> constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table -> dropForeign(['genre_id']);
            $table -> dropColumn('genre_id');
        });

        Schema::table('movie_tag', function (Blueprint $table) {
            $table -> dropForeign(['movie_id']);
            $table -> dropColumn('movie_id');

            $table -> dropForeign(['tag_id']);
            $table -> dropColumn('tag_id');
        });
    }
};
