<?php

return [

    'notification_url' => env('CLOUDINARY_NOTIFICATION_URL'),

    // 🔥 ВАЖНО: cloud_url можно оставить
    'cloud_url' => env('CLOUDINARY_URL'),

    // 🔥 КРИТИЧЕСКИ ВАЖНЫЙ БЛОК
    'cloud' => [
        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
        'api_key' => env('CLOUDINARY_API_KEY'),
        'api_secret' => env('CLOUDINARY_API_SECRET'),
    ],

    'url' => [
        'secure' => true,
    ],

];
