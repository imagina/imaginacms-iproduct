<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIproductProductTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('iproduct__product_translations', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->text('title');
      $table->string('slug');
      $table->text('summary')->nullable();
      $table->text('description')->nullable();
      $table->text('advanced_summary')->nullable();

      $table->integer('product_id')->unsigned();
      $table->string('locale')->index();
      $table->unique(['product_id', 'locale']);
      $table->foreign('product_id')->references('id')->on('iproduct__products')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('iproduct__product_translations', function (Blueprint $table) {
      $table->dropForeign(['product_id']);
    });
    Schema::dropIfExists('iproduct__product_translations');
  }
}
