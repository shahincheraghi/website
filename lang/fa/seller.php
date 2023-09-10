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
    'request_duplicate' => 'درخواست شما تکراری می باشد.',
    'confirm_request_is_exist' => 'شما از قبل فروشنده این محصول می باشید!',
    'confirm_request_accept' => 'شما اکنون فروشنده این محصول هستید!',
    'price_created' => 'قیمت با موفقیت ثبت گردید.',
    'price_duplicated' => 'این تنوع محصول از قبل ثبت شده است.',
    'product_created' => 'کالا با موفقیت ایجاد گردید.',
    'code_verify_failed' => 'کد تایید را به درستی وارد نمایید.',
    'code_verify_expired' => 'کد تایید منقضی شده است.',
    'email_verified' => 'ایمیل با موفقیت تایید شد.',
    'mobile_verified' => 'موبایل با موفقیت تایید شد.',
    'request_verify_access_denied' => 'درخواست ارسالی معتبر نمی باشد.',
    'send_verify_success' => 'کد تایید مجدد ارسال گردید.',
    'register_information' => 'اطلاعات کاربر با موفقیت ثبت گردید.',
    'document_stored' => 'مدارک شما با موفقیت ذخیره گردید.',
    'upload_has_failed' => 'بارگذاری با خطا مواجه شد!',
    'document_id_has_required' => 'انتخاب نوع مدرک الزامی است.',
    'access_denied' => 'شما دسترسی ندارید.',
    'request_submit' => 'درخواست شما با موفقیت ارسال گردید.',
    'transaction_cancel' => 'مرسوله با موفقیت لغو گردید.',
    'person' => [
        'real' => [
            'text' => 'حقیقی',
            'label' => 'info',
            'birth_date' => 'تاریخ تولد',
            'sh_sh' => 'شماره شناسنامه',
            'national_code' => 'کد ملی',
        ],
        'legal' => [
            'text' => 'حقوقی',
            'label' => 'default',
            'birth_date' => 'تاریخ ثبت شرکت',
            'sh_sh' => 'شماره ثبت شرکت',
            'national_code' => 'شناسه ملی شرکت',
        ],
    ],
    'documentation' => [
        'status' => [
            'pending' => [
                'text' => 'در انتظار بررسی',
                'label' => 'warning'
            ],
            'success' => [
                'text' => 'تایید شده',
                'label' => 'success'
            ],
            'reject' => [
                'text' => 'رد شده',
                'label' => 'danger'
            ],
            'expired' => [
                'text' => 'منقضی شده',
                'label' => 'info'
            ]
        ]
    ],
    'financial' => [
        'status' => [
            'pending' => [
                'text' => 'در انتظار بررسی',
                'label' => 'warning',
                'icon' => 'fa fa-info',
            ],
            'success' => [
                'text' => 'تایید شده',
                'label' => 'success',
                'icon' => 'fa fa-check',
            ],
            'reject' => [
                'text' => 'رد شده',
                'label' => 'danger',
                'icon' => 'fa fa-close',
            ],
        ]
    ],
    'contract' => [
        'status' => [
            'pending' => [
                'text' => 'در انتظار بررسی',
                'label' => 'warning'
            ],
            'success' => [
                'text' => 'تایید شده',
                'label' => 'success'
            ],
            'reject' => [
                'text' => 'رد شده',
                'label' => 'danger'
            ],
            'expired' => [
                'text' => 'منقضی شده',
                'label' => 'info'
            ]
        ]
    ],
    'notification' => [
        'user' => [
            'admin' => [
                'text' => 'مدیریت',
                'label' => 'info',
            ],
            'seller' => [
                'text' => 'فروشندگان',
                'label' => 'success',
            ],
            'customer' => [
                'text' => 'مشتریان',
                'label' => 'default',
            ]
        ],
        'level' => [
            'normal' => [
                'text' => 'عادی',
                'label' => 'info'
            ],
            'important' => [
                'text' => 'مهم',
                'label' => 'warning'
            ],
            'very_important' => [
                'text' => 'خیلی مهم',
                'label' => 'danger'
            ],
        ]
    ],
    'ticket' => [
        'level' => [
            'normal' => [
                'text' => 'عادی',
                'label' => 'info'
            ],
            'important' => [
                'text' => 'مهم',
                'label' => 'warning'
            ],
            'very_important' => [
                'text' => 'خیلی مهم',
                'label' => 'danger'
            ],
        ],
        'status' => [
            'pending' => [
                'text' => 'در حال بررسی',
                'label' => 'warning'
            ],
            'ongoing' => [
                'text' => 'در دست انجام',
                'label' => 'info'
            ],
            'answer_user' => [
                'text' => 'پاسخ کاربر',
                'label' => 'primary'
            ],
            'answer_admin' => [
                'text' => 'پاسخ مدیر',
                'label' => 'success'
            ],
            'closed' => [
                'text' => 'بسته',
                'label' => 'default'
            ],
        ]
    ],
    'product' => [
        'moderation_status' => [
            'draft' => [
                'text' => 'پیش نویس',
                'label' => 'info'
            ],
            'in_review' => [
                'text' => 'بررسی مجدد',
                'label' => 'warning'
            ],
            'waiting_for_confirm' => [
                'text' => 'در انتظار تایید',
                'label' => 'primary'
            ],
            'edit_after_approved' => [
                'text' => 'ویرایش پس از تایید',
                'label' => 'info'
            ],
            'approved' => [
                'text' => 'تایید شده',
                'label' => 'success'
            ],
            'in_review_after_approved' => [
                'text' => 'بررسی مجدد بعد از تایید',
                'label' => 'warning'
            ],
            'duplicate' => [
                'text' => 'تکراری',
                'label' => 'default'
            ],
            'removed' => [
                'text' => 'حذف شده',
                'label' => 'danger'
            ]
        ]
    ],
    'order' => [
        'transaction' => [
            'status' => [
                -2 => [
                    'text' => 'نقص مرسوله',
                    'label' => 'danger'
                ],
                -1 => [
                    'text' => 'لغو شده',
                    'label' => 'danger'
                ],
                0 => [
                    'text' => 'در صف بررسی',
                    'label' => 'warning'
                ],
                1 => [
                    'text' => 'تایید مرسوله',
                    'label' => 'success'
                ],
                2 => [
                    'text' => 'آماده سازی مرسوله',
                    'label' => 'info'
                ],
                3 => [
                    'text' => 'خروج از فروشگاه',
                    'label' => 'info'
                ],
                4 => [
                    'text' => 'تحویل به پست',
                    'label' => 'primary'
                ],
                5 => [
                    'text' => 'تحویل به مشتری',
                    'label' => 'secondary'
                ],
            ],
            'size' => [
                3 => [
                    'text' => 'خروج از فروشگاه',
                    'label' => 'info'
                ],
                4 => [
                    'text' => 'تحویل به پست',
                    'label' => 'primary'
                ],
                5 => [
                    'text' => 'تحویل به مشتری',
                    'label' => 'secondary'
                ],
            ]
        ]
    ]
];
