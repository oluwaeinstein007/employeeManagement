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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('Emp_ID');
            $table->string('Name_Prefix')->nullable();
            $table->string('First_Name');
            $table->string('Middle_Initial')->nullable();
            $table->string('Last_Name');
            $table->string('Gender');
            $table->string('E_Mail');
            $table->string('Date_of_Birth')->nullable();
            $table->string('Time_of_Birth')->nullable();
            $table->string('Age_in_Yrs')->nullable();
            $table->string('Date_of_Joining')->nullable();
            $table->string('Age_in_Company_Years')->nullable();
            $table->string('Phone_No')->nullable();
            $table->string('Place_Name')->nullable();
            $table->string('County')->nullable();
            $table->string('City')->nullable();
            $table->string('Zip')->nullable();
            $table->string('Region')->nullable();
            $table->string('User_Name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
