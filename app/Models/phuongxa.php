<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\quanhuyen;
use App\Models\tinhthanh;
class phuongxa extends Model
{
    //
    protected $table = 'VNPOST_PhuongXa';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function quanhuyen(){
        return $this->belongsTo(quanhuyen::class,'MaQuanHuyen','MaQuanHuyen');
    }
    public function MaTinhThanh(){
        return $this->belongsTo(tinhthanh::class,'MaTinhThanh','MaTinhThanh');
    }
}
