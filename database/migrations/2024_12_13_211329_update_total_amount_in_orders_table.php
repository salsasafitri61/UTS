<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTotalAmountInOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Mengatur total_amount memiliki nilai default
            $table->decimal('total_amount', 10, 2)->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Mengembalikan perubahan jika rollback
            $table->decimal('total_amount', 10, 2)->nullable()->change();
        });
    }
}
