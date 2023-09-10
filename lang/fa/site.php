<?php

return [
    'registered' => 'با موفقیت ثبت گردید.',
    'created' => 'با موفقیت ایجاد گردید.',
    'deleted' => 'با موفقیت حذف گردید.',
    'updated' => 'با موفقیت بروزرسانی گردید.',
    'not_found' => 'آیتم مورد نظر یافت نگردید.',
    'sorted' => 'جابجایی صورت گرفت.',
    'duplicated' => 'این آیتم از قبل وجود دارد.',
    'duplicated_alarm' => 'این درخواست از قبل ثبت شده است.',
    'changed_status' => 'با موفقیت تغییر وضیت صورت گرفت.',
    'default_delete' => 'دیتای پیش فرض قابل حذف شدن نیست.',
    'bill_checked' => 'صورت حساب ها بروزرسانی گردیدند.',
    'request_fail' => 'درخواست با شکست مواجه شد، بعدا تلاش کنید.',
    'bill_paid' => 'صورت حساب با موفقیت پرداخت گردید.',
    'empty_cart' => 'سبد خرید شما خالیه هنوز :(',
    'map_fault' => 'سرویس نقشه در حال حاضر قادر به پاسخگویی نیست!',
    'product' => [
        'status' => [
            -1 => [
                'text' => 'در انتظار بررسی',
                'label' => 'warning'
            ],
            0 => [
                'text' => 'در انتظار تکمیل',
                'label' => 'primary'
            ],
            1 => [
                'text' => 'تایید شده',
                'label' => 'success'
            ],
            2 => [
                'text' => 'رد شده',
                'label' => 'danger'
            ],
            3 => [
                'text' => 'توقف تولید',
                'label' => 'black'
            ],
            4 => [
                'text' => 'تماس بگیرید',
                'label' => 'default'
            ],
        ],
        'available_in_stock' => 'موجود در انبار',
        'specific_attribute' => 'ویژگی های خاص',
        'specifications' => 'مشخصات',
        'bundle_has_expired' => 'این طرح تخفیفی به اتمام رسیده است.',
        'bundle_limit_sale_for_user' => 'سقف مجاز خرید این طرح برای شما به اتمام رسیده است.',
        'bundle_limit_sale_for_user_by_number' => 'امکان خرید بیش از :number تا در این طرح تخفیفی وجود ندارد.',
        'add_bundle_to_cart_successful' => 'محصول با موفقیت به سبد خرید شما اضافه گردید!',

    ],
    'item' => [
        'status' => [
            -1 => [
                'text' => 'لغو شده',
                'label' => 'warning'
            ],
            0 => [
                'text' => 'در انتظار تکمیل',
                'label' => 'primary'
            ],
            1 => [
                'text' => 'تایید شده',
                'label' => 'success'
            ],
            2 => [
                'text' => 'لغو شده',
                'label' => 'danger'
            ],
        ],
    ],
    'wholesale' => [
        'usable' => [
            'both' => 'مشتریان و فروشندگان',
            'seller' => 'فروشندگان',
            'user' => 'مشتریان'
        ]
    ],
    'header' => [
        'login_register' => 'ورود | ثبت نام',
        'profile' => 'ناحیه کاربری',
        'order_me' => ' سفارش های من',
        'favorite_me' => 'نشون کرده های من',
        'logout' => ' خروج از حساب کاربری',
        'login_to_admin' => 'ورود به پنل مدیریت',
        'login_to_seller' => 'ورود به پنل فروشندگان',

    ],
    'price' => [
        'ready_to_send' => 'آماده ارسال',
        'ready_to_send_from' => 'ارسال از :day روز کاری دیگر',
        'purchase_points' => 'امتیاز خرید :score',
        'add_to_cart' => 'افزودن به سبد خرید',
    ],
    'comment' => [
        'created_successfully' => 'نظر جدید با موفقیت ثبت گردید.',
    ],
    'payment' => [
        'discount' => [
            'remove_success' => 'کد تخفیف با موفقیت حذف گردید!',
            'not_exist' => 'این کد معتبر نیست!',
            'already_used' => 'شما قبلا از این کد تخفیف استفاده کرده اید.',
            'is_not_valid' => 'این کد تخفیف دیگر معتبر نیست!',
            'has_expired' => 'زمان استفاده از این تخفیف به پایان رسیده است!',
            'limit_failed' => 'سبد خرید شما به حداقل مبلغ قابل اعمال نرسیده است. حداقل مبلغ سبد خرید :limit می باشد!',
            'involvement_amazing' => 'کالاهای شگفت انگیز شامل کد تخفیف نمی باشند!',
            'involvement_product_seller' => 'کد تخفیف شامل این کالا ها نمی باشد یا فروشنده این کالا ها جزو این تخفیف نیست!',
            'approved' => 'کد تخفیف با موفقیت اعمال گردید.',
            'code_expired' => 'کد تخفیف به علت محدودیت استفاده کننده دیگر معتبر نمی باشد!'
        ],
        'gateway' => [
            'not_selected' => 'هیچ روش پرداختی انتخاب نشده است!',
        ],
        'not_enable_payment_shop' => 'سیستم فرایند پرداخت فعال نیست، بعدا تلاش نمایید.',
        'giftcard' => [
            'expired' => 'کارت هدیه غیرفعال یا قبلا استفاده شده است.',
            'not_valid' => 'کارت هدیه معتبر نمی باشد.',
            'account_charged' => 'به اعتبار حساب شما مبلغ :amount تومان افزوده گردید.',
            'failed' => 'خطایی در فرایند ثبت رخ داد. دوباره تلاش نمایید!',
        ],
    ],
    'cart' => [
        'not_available' => 'برخی از کالا ها به علت عدم موجودی بصورت خودکار از سبد شما حذف گردید.'
    ],
    'shipping' => [
        'field_not_complete' => 'برخی از اطلاعات تکمیلی پر نشده است!'
    ],
    'token_has_not_expire' => 'زمان ارسال توکن جدید فرا نرسیده است',
    'token_generated' => 'پیام دوباره ارسال گردید.',
    'home' => [
        'list' => [
            'advertising' => [
                'box' => [
                    'own' => 'col-md-12 col-sm-12',
                    'two' => 'col-sm-6 mb-sm-0 mb-3',
                    'three' => 'col-sm-4 mb-sm-0 mb-3',
                    'four' => 'col-lg-3 col-md-6 col-6 mb-lg-0 mb-3',
                ]
            ]
        ]
    ],
    'subscribe' => [
        'created' => 'ایمیل شما با موفقیت ثبت گردید.',
        'duplicated' => 'این ایمیل از قبل ثبت شده است.',
    ],
    'order' => [
       'try_again' => 'فرایند پرداخت را از قسمت پرداخت مجدد دنبال نمایید!'
    ]

];
