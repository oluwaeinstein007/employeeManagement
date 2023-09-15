<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    //gave access to all columns in the database
    protected $fillable = [
        'Emp_ID',
        'Name_Prefix',
        'First_Name',
        'Middle_Initial',
        'Last_Name',
        'Gender',
        'E_Mail',
        'Date_of_Birth',
        'Time_of_Birth',
        'Age_in_Yrs',
        'Date_of_Joining',
        'Age_in_Company_Years',
        'Phone_No',
        'Place_Name',
        'County',
        'City',
        'Zip',
        'Region',
        'User_Name',
    ];
}
