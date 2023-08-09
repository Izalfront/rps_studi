<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Matkul;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('studi', function (Blueprint $table) {
            $table->foreignIdFor(Matkul::class)->after('prodi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('studi', function (Blueprint $table) {
            $table->dropColumn('matkul_id');
        });
    }
};
