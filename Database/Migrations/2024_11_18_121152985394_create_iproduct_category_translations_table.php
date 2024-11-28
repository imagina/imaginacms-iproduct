<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIproductCategoryTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('iproduct__category_translations', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->text('title');
      $table->string('slug');
      $table->text('description')->nullable();

      $table->integer('category_id')->unsigned();
      $table->string('locale')->index();
      $table->unique(['category_id', 'locale']);
      $table->foreign('category_id')->references('id')->on('iproduct__categories')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('iproduct__category_translations', function (Blueprint $table) {
      $table->dropForeign(['category_id']);
    });
    Schema::dropIfExists('iproduct__category_translations');
  }
}
