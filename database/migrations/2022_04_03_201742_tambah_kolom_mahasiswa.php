<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa', function(Blueprint $table){
            $table->date('tanggal_lahir')->after('nama')->nullable();
            $table->string('email', 50)->after('no_handphone')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function(Blueprint $table){
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('email');
        });
    }
}