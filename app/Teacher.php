<?php namespace App;
    use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {
	protected $table = 'teachers_info';
    
	protected $fillable = array('spousename','nextofkinname', 'primary_p_no','secondary_p_no','county',
    'p_employment','subject1','subject2','extra_curruclum');
}