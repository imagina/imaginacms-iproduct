<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('iproduct__products', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->text('options')->nullable();
      $table->integer('status')->default(1);
      $table->integer('category_id');
      $table->string('sku')->nullable();
      $table->string('reference')->nullable();
      $table->integer('featured')->default(0);
      $table->integer('is_internal')->default(0);
      $table->integer('external_id')->nullable();

      // Audit fields
      $table->timestamps();
      $table->auditStamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
  }
};
