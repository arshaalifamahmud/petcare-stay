<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('rooms', function(Blueprint $t){ $t->id(); $t->string('name')->unique(); $t->enum('type',['Standard','Deluxe','VIP']); $t->unsignedInteger('capacity'); $t->unsignedInteger('price_per_day'); $t->enum('status',['Tersedia','Penuh','Maintenance'])->default('Tersedia'); $t->timestamps(); }); } public function down(): void { Schema::dropIfExists('rooms'); } };
