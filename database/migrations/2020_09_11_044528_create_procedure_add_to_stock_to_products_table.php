<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProcedureAddToStockToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE DEFINER=root@localhost TRIGGER `add_to_stock` BEFORE INSERT ON `purchase_details`
                    FOR EACH ROW BEGIN
                        UPDATE products SET stock = stock + NEW.quantity WHERE id = NEW.product_id;
                    END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `add_to_stock`');
    }
}
