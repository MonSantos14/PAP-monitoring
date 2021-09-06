<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChanEndorsementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chan_endorsements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proposal_id')->constrained()->onDelete('cascade');
            $table->string('proposal_endorsement')->nullable;
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
        Schema::dropIfExists('chan_endorsements');
    }
}
