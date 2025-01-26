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
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // タスクの一意なID
            $table->string('title'); // タスクのタイトル
            $table->text('description')->nullable(); // タスクの説明（オプション）
            $table->enum('status', ['未着手', '進行中', '完了'])->default('未着手'); // ステータス
            $table->date('due_date')->nullable(); // 締め切り日（オプション）
            $table->unsignedBigInteger('user_id'); // ユーザーID（外部キー）
            $table->timestamps(); // 作成日時と更新日時

            // 外部キー制約
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // 親ユーザー削除時にタスクも削除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
