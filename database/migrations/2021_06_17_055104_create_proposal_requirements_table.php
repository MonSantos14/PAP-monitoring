<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_requirements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('proposal_id')->constrained()->onDelete('cascade');
            $table->string('proposal_CRP')->nullable();
            $table->string('proposal_CRP_status')->nullable();
            $table->string('proposal_CRP_remarks')->nullable();
            $table->string('proposal_LIB')->nullable();
            $table->string('proposal_LIB_status')->nullable();
            $table->string('proposal_LIB_remarks')->nullable();
            $table->string('proposal_CVP')->nullable();
            $table->string('proposal_CVP_status')->nullable();
            $table->string('proposal_CVP_remarks')->nullable();
            $table->string('proposal_SDRPM')->nullable();
            $table->string('proposal_SDRPM_status')->nullable();
            $table->string('proposal_SDRPM_remarks')->nullable();
            $table->string('proposal_CERT')->nullable();
            $table->string('proposal_CERT_status')->nullable();
            $table->string('proposal_CERT_remarks')->nullable();
            $table->string('proposal_WP')->nullable();           
            $table->string('proposal_WP_status')->nullable();           
            $table->string('proposal_WP_remarks')->nullable();           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal_requirements');
    }
}
