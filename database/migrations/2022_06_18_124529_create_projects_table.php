<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('projectNo');
            $table->string('projectName');
            $table->string('category');
            $table->string('client');
            $table->string('progress');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('billingType');        
            $table->string('price');           
            $table->integer('estimateHour');  
            $table->string('status');           
            $table->string('demoUrl');        
            $table->string('subCompany');
            $table->string('assign');           
            $table->text('desc'); 
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
        Schema::dropIfExists('projects');
    }
}
