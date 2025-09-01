<?php

return [
    'community' => [
        'notice' => "공지사항",
        'gallery' => "갤러리",
        'private' => "1:1문의",
        'newsroom' => "뉴스룸",
    ],
    'booking' => [
        'status' => [
            0 => '신청중(입금대기)',
            1 => '완료',
            2 => '신청취소',
        ],
    ],
    'donation_url' => env('DONATION_URL'),
    'esg_url' => env('ESG_URL'),
];
