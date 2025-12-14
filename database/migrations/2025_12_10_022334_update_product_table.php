<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductTable extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'latitude')) {
                $table->decimal('latitude', 10, 7);
            }
            if (!Schema::hasColumn('products', 'longitude')) {
                $table->decimal('longitude', 11, 7);
            }
            $table->decimal('price', 10, 2)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'latitude')) {
                $table->dropColumn('latitude');
            }
            if (Schema::hasColumn('products', 'longitude')) {
                $table->dropColumn('longitude');
            }
        });
    }
}
