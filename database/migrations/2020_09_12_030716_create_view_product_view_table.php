<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewProductViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW product_view AS
                SELECT p.id, p.code, p.name, p.stock AS quantity, p.sale_price, p.purchase_price, p.created_at, p.deleted_at,
                        p.stock * p.sale_price AS total_sale_price,
                        p.stock * purchase_price AS total_purchase_price,
                        s.id AS subcategory_id, s.name AS subcategory_name,
                        c.id AS category_id, c.name AS category_name
                FROM products AS p
                INNER JOIN subcategories AS s
                ON p.subcategory_id = s.id
                INNER JOIN categories AS c
                ON s.category_id = c.id;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW product_view");
    }
}
