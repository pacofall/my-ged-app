<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });


        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });


        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            //$table->foreignId('category_id')->constrained();
            $table->integer("category_id");
            $table->foreign("category_id")->references("id")->on("categories");

            $table->string("name");
            $table->text("description")->nullable();
            $table->string("source");
            $table->enum('access', ['private', 'public']);
//            $table->foreignId('created_by')->constrained("users");
            $table->integer("created_by");
            $table->foreign("created_by")->references("id")->on("users")->onDelete("set null");

            $table->string("path");

            $table->timestamps();
        });


        Schema::create('document_tag', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained();
            $table->foreignId('document_id')->constrained();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::create('documents_users_permissions', function (Blueprint $table) {
            $table->integer("document_id");
            $table->integer("user_id");
            $table->integer("permission_id");
            $table->foreign("document_id")->references("id")->on("documents");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("permission_id")->references("id")->on("permissions");

           // $table->unique(['document_id', 'user_id', 'permission_id']);

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('documents');
        // Schema::dropIfExists('document_tag');
    }
};
