<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCompany extends Model
{
    use HasFactory;

   protected $table = 'new_companies';

   protected $primaryKey = 'id';

   public $fillable = ['name','address','contact_no'];
}
