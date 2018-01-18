<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'files';
	
	/**
     * The primary key associated with the model.
     *
     * @var string
     */
	protected $primaryKey = 'file_id';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name', 'file_type', 'admin_id'
    ];

    public function Admin(){
        return $this->belongsTo('App\Admin', 'admin_id', 'admin_id');
    }

    public function ViewedFiles(){
        return $this->hasMany('App\ViewedFiles', 'file_id', 'file_id');
    }
}
