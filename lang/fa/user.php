<?php

return [
    'created' => 'با موفقیت ایجاد گردید.',
    'sorted' => 'با موفقیت جابجا گردید.',
    'deleted' => 'با موفقیت حذف گردید.',
    'updated' => 'با موفقیت ویرایش گردید.',
    'changed' => 'با موفقیت تغییرات اعمال گردید.',
    'not_found' => 'چیزی یافت نشد.',
    'request_fail' => 'در خواست با شکست مواجه شد، بعدا امتحان کنید.',
    'changed_status' => 'با موفقیت تغییر وضعیت یافت.',
    'saved' => 'با موفقیت ذخیره گردید.',
    'removed' => 'با موفقیت حذف گردید.',
    'created_pending_confirm' => 'درخواست شما با موفقیت ثبت گردید، منتظر بررسی کارشناسان باشید!',
    'request_pending_review' => 'درخواست قبلی شما در انتظار بررسی می باشد!',
    'order' => [
        'cancel' => [
            'not_found' => 'سفارشی با این مشخصات یافت نشد!',
            'can_not_be_canceled' => 'این سفارش اجازه لغو ندارد!',
            'request_submit_waiting' => 'درخواست لغو سفارش شما با موفقیت ثبت گردید، منتظر بررسی کارشناسان ما باشید!',
            'request_duplicate' => 'درخواست لغو سفارش از قبل وجود دارد!',
            'state' => [
                -3 => [
                    'text' => 'عدم تایید لغو سفارش',
                    'label' => 'danger',
                ],
                -2 => [
                    'text' => 'عدم تایید انبار دار',
                    'label' => 'danger',
                ],
                -1 => [
                    'text' => 'عدم تایید کارشناس سایت',
                    'label' => 'danger',
                ],
                0 => [
                    'text' => 'در انتظار بررسی برای لغو',
                    'label' => 'warning',
                ],
                1 => [
                    'text' => 'تایید کارشناس سایت',
                    'label' => 'info',
                ],
                2 => [
                    'text' => 'تایید انبار دار',
                    'label' => 'info',
                ],
                3 => [
                    'text' => 'تایید نهایی',
                    'label' => 'success',
                ],
            ],
            'type_check' => [
                'storekeeper' => [
                    'text' => 'بررسی انباردار',
                    'label' => 'info',
                ],
                'expert' => [
                    'text' => 'بررسی کارشناس',
                    'label' => 'success'
                ],
                'both' => [
                    'text' => 'بررسی کارشناس و انبار دار',
                    'label' => 'warning'
                ],
            ],
            'inspection' => 'بررسی توسط :name در تاریخ :date انجام گردید. :description',
            'storekeeper_status' => [
                '-1' => [
                    'text' => 'عدم تایید',
                    'label' => 'danger',
                ],
                '0' => [
                    'text' => 'در انتظار بررسی',
                    'label' => 'warning',
                ],
                '1' => [
                    'text' => 'تاییده شده',
                    'label' => 'success',
                ],
            ],
            'expert_status' => [
                '-1' => [
                    'text' => 'عدم تایید',
                    'label' => 'danger',
                ],
                '0' => [
                    'text' => 'در انتظار بررسی',
                    'label' => 'warning',
                ],
                '1' => [
                    'text' => 'تاییده شده',
                    'label' => 'success',
                ],
            ],
        ]
    ]
];
