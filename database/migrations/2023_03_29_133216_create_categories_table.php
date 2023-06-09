<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $categories = ['Abbigliamento', 'Bellezza', 'Cancelleria e prodotti per ufficio', 'Elettronica', 'Fai da te', 'Film e TV', 'Giardino e giardinaggio', 'Informatica', 'Prodotti per animali domestici', 'Videogiochi'];

    foreach($categories as $category){
        Category::create([
            'name'=> $category,
        ]);
    }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
