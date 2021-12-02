<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Models\AppConst.php
class AppConst extends Model
{
   const DEFAULT_PER_PAGE = 10; // mặc định paginate(10)
   const HOME_ARTICLE_PER_PAGE = 20;   // hiện thị trên trang chủ 20 cái
}
