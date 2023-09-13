<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table='experiences';
    protected $primaryKey='id';
    protected $fillable=['date','task_name','company_name','description','status','active','order'];
    public function scopeStatusActive($query){
        return $query->where('status',1);
    }
}
