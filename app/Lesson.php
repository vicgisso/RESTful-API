<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lesson
 * @package App
 */
class Lesson extends Model
{

    protected $fillable = ['title','body','free'];

}
