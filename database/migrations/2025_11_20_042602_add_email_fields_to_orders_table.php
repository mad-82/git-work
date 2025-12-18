<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('subtotal', 10, 2)->default(0)->after('total_amount');
            $table->decimal('shipping', 10, 2)->default(0)->after('subtotal');
            $table->decimal('tax', 10, 2)->default(0)->after('shipping');
            $table->json('items')->nullable()->after('tax');
            $table->string('billing_first_name')->nullable()->after('items');
            $table->string('billing_last_name')->nullable()->after('billing_first_name');
            $table->text('billing_address')->nullable()->after('billing_last_name');
            $table->string('billing_city')->nullable()->after('billing_address');
            $table->string('billing_country')->nullable()->after('billing_city');
            $table->string('billing_postcode')->nullable()->after('billing_country');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'subtotal',
                'shipping',
                'tax',
                'items',
                'billing_first_name',
                'billing_last_name',
                'billing_address',
                'billing_city',
                'billing_country',
                'billing_postcode'
            ]);
        });
    }
};