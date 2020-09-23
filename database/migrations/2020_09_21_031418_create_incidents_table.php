<?php

use App\Models\Incident;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            // By using constrained() with no arguments, convention is used
            // to guess what table it is referring to.
            $table->foreignId('location_id')->constrained();
            $table->foreignId('incident_type_id')->constrained();
            $table->dateTime('occurrence_time');
            $table->enum('severity', Incident::SEVERITY_LEVELS);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
