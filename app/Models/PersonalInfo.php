<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $table='personal_info';
    protected $primaryKey='id';
    protected $fillable=['main_title','about_text','btn_contact_text','small_title_left','small_title_right',
        'full_name','image','task_name','birthday','website','phone','mail','address','cv',
        'languages','interests','btn_contact_link','title_left','title_right'];
   /* public function selectColumn($query){
        return $query->select('');
    }*/
}
