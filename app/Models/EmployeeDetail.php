<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    use HasFactory;

    protected $table= 'employee_details';

    protected $primaryKey= 'id';

    public $fillable = ['name','working_date','total_hours'];
}
