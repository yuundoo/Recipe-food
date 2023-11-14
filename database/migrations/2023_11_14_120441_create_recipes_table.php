<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

      /**
     * Run the migrations.
     *
     * @return void
     *
     */
    public function up():void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(); // 작성자 ID (외래 키)
            $table->string('name'); // 레시피 이름
            $table->text('ingredients'); // 재료
            $table->text('description'); // 레시피 설명
            $table->string('image_name') -> nullable();
            $table->string('image_path') -> nullable();
            $table->timestamps(); // 생성일 및 수정일
        });
    }

     /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down():void
    {
        Schema::dropIfExists('recipes');
    }

};

