<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table='education';
    protected $primaryKey='id';
    protected $fillable=['ed_date','university','department','description','status'];
}
