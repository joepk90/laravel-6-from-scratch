<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class); // SQL: select * from user where project_id = {ID OF CURRENT PROJECT}
    }
}
