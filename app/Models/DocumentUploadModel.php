<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentUploadModel extends Model
{
    use HasFactory;
    protected $table='document_upload';
    protected $primaryKey = 'document_upload_id';

    protected $fillable = [
        'document_name','image_name'
    ];


}
