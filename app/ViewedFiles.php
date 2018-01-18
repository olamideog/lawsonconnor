<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewedFiles extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'viewed_files';
	
	/**
     * The primary key associated with the model.
     *
     * @var string
     */
	protected $primaryKey = 'view_id';

    public function UserViewed(){
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    public function FileViewed(){
        return $this->belongsTo('App\Files', 'file_id', 'file_id');
    }
}