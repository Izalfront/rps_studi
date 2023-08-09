<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Jurusan;
use App\Models\Prodi;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Jurusan::class);
            $table->foreignIdFor(Prodi::class);
            $table->integer('semester');
            $table->integer('status');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studi');
    }
};
