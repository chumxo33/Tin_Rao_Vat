<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class ValidDateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

//    App\Rules\ValidDateRule.php
//    use Carbon\Carbon;
    public function passes($attribute, $value)
    {
        // Chuyển cái chuỗi ngày/tháng của User thành Carbon Object 
        $userSelectedDate = Carbon::createFromFormat('Y-m-d', $value);
        // Nó sẽ lấy lớn hơn ngày hiện tại
        $minDate = Carbon::now()->addDay(1);
        return $userSelectedDate >= $minDate;
        // return true;
    }

    public function message()
    {
        return 'Bạn lựa chọn ngày chưa đúng';
    }
}
