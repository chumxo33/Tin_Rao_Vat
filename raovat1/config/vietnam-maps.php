<?php
// config/vietnam-maps.php
return [
    'tables' => [
        'provinces' => 'provinces', // Tỉnh
        'districts' => 'districts', // Quận huyện
        'wards' => 'wards', // Xã phường
    ],

    'columns' => [
        'name' => 'name',   
        'gso_id' => 'gso_id',
        'province_id' => 'province_id',
        'district_id' => 'district_id',
    ],
];
