<?php

namespace App;

class Consts
{
    // For delete some data
    const STATUS_DELETE = 'delete';

    // Status for users
    const USER_STATUS = [
        'pending' => 'pending',
        'active' => 'active',
        'deactive' => 'deactive',
        'delete' => 'delete'
    ];

    // Status for general
    const STATUS = [
        'active' => 'active',
        'deactive' => 'deactive'
    ];

    // Array taxonomy status
    const TAXONOMY_STATUS = [
        'active' => 'active',
        'deactive' => 'deactive'
    ];
    // Thể loại taxonomy
    const TAXONOMY = [
        'post' => 'post',
        // 'service' => 'service',
        'product' => 'product',
        // 'resource' => 'resource',
        'tags' => 'tags'
    ];
    // Loại bài đăng
    const POST_TYPE = [
        'post' => 'post',
        'product' => 'product',
        // 'service' => 'service',
        // 'resource' => 'resource'
    ];
    // Mảng lưu trạng thái bài viết
    const POST_STATUS = [
        'pending' => 'pending',
        'active' => 'active',
        'deactive' => 'deactive'
    ];
    const ROUTE_TAXONOMY = [
        'post' => 'frontend.cms.post',
        // 'service' => 'frontend.cms.service',
        'product' => 'frontend.cms.product',
        // 'resource' => 'frontend.cms.resource',
        // 'tags' => 'frontend.cms.tags'
    ];
    const ROUTE_POST = [
        'post' => 'frontend.cms.post.detail',
        // 'service' => 'frontend.cms.service.detail',
        'product' => 'frontend.cms.post.detail',
        // 'resource' => 'frontend.cms.resource.detail'
    ];
    const ROUTE_CUSTOM_PAGE = 'frontend.page';

    const DEFAULT_PAGINATE_LIMIT = 20;
    const POST_PAGINATE_LIMIT = 6;
    const SERVICES_PAGINATE_LIMIT = 6;
    const RESOURCE_PAGINATE_LIMIT = 6;
    const DEFAULT_OTHER_LIMIT = 6;
    const DEFAULT_RELATED_LIMIT = 6;
    const DEFAULT_SIDEBAR_LIMIT = 5;
    const PRODUCT_PAGINATE_LIMIT = 12;

    const TITLE_BOOLEAN = [
        '1' => 'true',
        '0' => 'false'
    ];

    const MENU_TYPE = [
        'header' => 'header',
        'footer' => 'footer'
    ];

    const URI_TYPE = [
        'route' => 'Route name',
        'path' => 'Path',
        'url' => 'Url Customize',
    ];

    // Loại liên hệ
    const CONTACT_TYPE = [
        'contact' => 'contact',
        'faq' => 'faq',
        'newsletter' => 'newsletter',
        'advise' => 'advise',
        'call_request' => 'call_request'
    ];
    const CONTACT_STATUS = [
        'new' => 'new',
        'processing' => 'processing',
        'processed' => 'processed',
        'cancel' => 'cancel'
    ];
    // Type for order
    const ORDER_TYPE = [
        'product' => 'product',
        'service' => 'service',
    ];
    const ORDER_STATUS = [
        'new' => 'new',
        'processing' => 'processing',
        'processed' => 'processed',
        'cancel' => 'cancel'
    ];

    // Tạo danh sách chức năng định tuyến để gọi khi tạo trang trong admin -> người dùng có thể tùy chọn
    const ROUTE_NAME = [
        [
            "title" => "Trang chủ",
            "name" => "frontend.home",
            "template" => [
                [
                    "title" => "Mặc định",
                    "name" => "home.primary"
                ]
            ],
            "show_route" => true
        ],
        [
            "title" => "Chi tiết bài viết",
            "name" => "frontend.cms.post.detail",
            "template" => [
                [
                    "title" => "Mặc định",
                    "name" => "post.detail"
                ]
            ]
        ],
        [
            "title" => "Danh mục bài viết",
            "name" => "frontend.cms.post",
            "template" => [
                [
                    "title" => "Mặc định",
                    "name" => "post.default"
                ]
            ]
        ],
        [
            "title" => "Kho giao diện",
            "name" => "frontend.cms.product",
            "template" => [
                [
                    "title" => "Mặc định",
                    "name" => "product.default"
                ]
            ],
            "show_route" => true
        ],
        [
            "title" => "Chi tiết giao diện",
            "name" => "frontend.cms.product.detail",
            "template" => [
                [
                    "title" => "Mặc định",
                    "name" => "product.detail"
                ]
            ]
        ],
        [
            "title" => "Liên hệ",
            "name" => "frontend.contact",
            "template" => [
                [
                    "title" => "Mặc định",
                    "name" => "contact.default"
                ]
            ],
            "show_route" => true
        ],
        [
            "title" => "Tìm kiếm",
            "name" => "frontend.search",
            "template" => [
                [
                    "title" => "Mặc định",
                    "name" => "search.default"
                ]
            ]
        ],
        [
            "title" => "Trang tùy chọn",
            "name" => "frontend.page",
            "template" => [
                [
                    "title" => "Bảng giá",
                    "name" => "page.price"
                ],
                [
                    "title" => "Nội dung",
                    "name" => "page.content"
                ],
                [
                    "title" => "Giới thiệu",
                    "name" => "page.intro"
                ],
                [
                    "title" => "Thiết kế Website",
                    "name" => "page.website"
                ],
                [
                    "title" => "Dịch vụ Content",
                    "name" => "page.service_content"
                ],
                [
                    "title" => "Dịch vụ Ads Facebook",
                    "name" => "page.ads_facebook"
                ],
                [
                    "title" => "Dịch vụ Ads Google",
                    "name" => "page.ads_google"
                ],
                [
                    "title" => "Dịch vụ SEO tổng thể",
                    "name" => "page.seo"
                ]
            ],
            "show_route" => true,
            "has_alias" => true
        ]
    ];
}
