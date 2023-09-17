<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    use HasFactory;
    protected $table = 'portfolio_images';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
