<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->bigInteger('number')->comment('定員');
            $table->string('amenity', 500)->comment('アメニティ');
            $table->bigInteger('price')->comment('価格');
            $table->string('pay', 500)->comment('支払方法');
            $table->string('note', 500)->comment('備考');
            $table->string('image', 100)->comment('画像');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('number');
            $table->dropColumn('amenity');
            $table->dropColumn('price');
            $table->dropColumn('pay');
            $table->dropColumn('note');
            $table->dropColumn('image');
        });
    }
}
