<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('proposal_refID');
            $table->string('proposal_title');
            $table->integer('proposal_duration')->nullable();
            $table->string('proposal_leader')->nullable();
            $table->string('proposal_read')->default('new');
            $table->char('proposal_status')->default('Draft');
            $table->char('proposal_location')->default('Proponent');
            $table->string('year')->nullable();
            $table->string('quarter');
            $table->string('college');
            $table->integer('counter');
            $table->date('submitted_at');
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
        Schema::dropIfExists('proposals');
    }
}
