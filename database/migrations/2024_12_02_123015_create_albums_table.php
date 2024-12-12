<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;


class CreateAlbumsTable extends Migration
{
    /**
     * Run.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id(); 
            $table->string('performer'); 
            $table->string('album_name'); 
            $table->string('cover_image_url')->nullable();
            $table->string('description')->nullable();
            $table->year('year_of_release'); 
            $table->timestamps(); 
            $table->softDeletes();
        });

        Schema::create('tracks', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('album_id'); 
            $table->string('name'); 
            $table->string('length'); 
            $table->timestamps(); 
            $table->softDeletes();
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        });
    }

    /**
     * Rollback migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
        Schema::dropIfExists('albums');
    }
}
