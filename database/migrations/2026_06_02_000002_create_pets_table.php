<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('pets', function(Blueprint $t){ $t->id(); $t->foreignId('pet_owner_id')->constrained()->cascadeOnDelete(); $t->string('name'); $t->string('species'); $t->string('breed')->nullable(); $t->unsignedInteger('age')->nullable(); $t->enum('gender',['Jantan','Betina']); $t->text('notes')->nullable(); $t->timestamps(); }); } public function down(): void { Schema::dropIfExists('pets'); } };
