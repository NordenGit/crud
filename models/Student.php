
<?php
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    protected $table = 'students';
    protected $fillable = ['firstname', 'lastname'];
    public $timestamps = false;
}
?>
