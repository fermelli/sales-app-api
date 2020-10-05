<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class CreateProcedureRemoveToStockToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE DEFINER=root@localhost TRIGGER `remove_to_stock` BEFORE INSERT ON `sale_details`
                    FOR EACH ROW BEGIN
                        UPDATE products SET stock = stock - NEW.quantity WHERE id = NEW.product_id AND stock >= stock - NEW.quantity;
                    END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `remove_to_stock`');
    }
}
