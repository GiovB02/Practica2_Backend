<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'lastname')) {
            $table->string('lastname')->after('name');
        }

        if (!Schema::hasColumn('users', 'username')) {
            $table->string('username')->unique()->after('lastname');
        }
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        if (Schema::hasColumn('users', 'lastname')) {
            $table->dropColumn('lastname');
        }

        if (Schema::hasColumn('users', 'username')) {
            $table->dropColumn('username');
        }
    });
}

};