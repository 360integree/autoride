<?php

/******************************************************************************/
/******************************************************************************/

TFElement::add
(
	'F01',
	array
	(
		'label'=>__('<i>[01]</i>Base','autoride'),
		'description'=>__('Usage:<br/>- base font.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(18,18,18,18,18),
		'font_weight'=>'300',
		'line_height'=>'1.66666'
	),
	array
	(
		'a',
		'body',
		'input',
		'select',
		'textarea',
		'html .select2-container--default .select2-selection--single .select2-selection__rendered'
	)
);

TFElement::add
(
	'F02',
	array
	(
		'label'=>__('<i>[02]</i>Header H1','autoride'),
		'description'=>__('Usage:<br/>- header H1.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(32,32,28,28,26),
		'font_weight'=>'400',
		'line_height'=>'1.5em'
	),
	array
	(
		'h1',
		'h1 a',
		'.theme-page .theme-page-header .theme-page-header-title.theme-page-header-title-type-text>h1'
	)
);

TFElement::add
(
	'F03',
	array
	(
		'label'=>__('<i>[03]</i>Header H2','autoride'),
		'description'=>__('Usage:<br/>- header H2.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(28,28,26,26,24),
		'font_weight'=>'400',
		'line_height'=>'1.5em'
	),
	array
	(
		'h2',
		'h2 a'
	)
);

TFElement::add
(
	'F04',
	array
	(
		'label'=>__('<i>[04]</i>Header H3','autoride'),
		'description'=>__('Usage:<br/>- header H3.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(24,24,22,22,20),
		'font_weight'=>'400',
		'line_height'=>'1.5em'
	),
	array
	(
		'h3',
		'h3 a'
	)
);

TFElement::add
(
	'F05',
	array
	(
		'label'=>__('<i>[05]</i>Header H4','autoride'),
		'description'=>__('Usage:<br/>- header H4,<br/>- header of item in "Gallery" component,<br/>- header of item in "Recent posts" component,<br>- header of item in vehicle list,<br/>- header of "Notice" component,<br/>- content of "Features" (style 2) item component,<br/>- item header of component "Features circle",<br/>- subheader of component "Header and subheader".','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(18,18,16,16,16),
		'font_weight'=>'700',
		'line_height'=>'1.66666em',
		'text_transform'=>'none'
	),
	array
	(
		'h4',
		'h4 a',
		'html .woocommerce ul.products li.product .woocommerce-LoopProduct-link h3',
		'html .woocommerce-page ul.products li.product .woocommerce-LoopProduct-link h3',
		'.theme-vehicle-list .theme-vehicle-list-item .theme-vehicle-list-item-image>a>span:first-child>.theme-vehicle-list-item-title',
		'.theme-component-gallery>ul>li>a>span>span:first-child+span',
		'.theme-component-notice>.theme-component-notice-content>h4',
		'.theme-component-feature.theme-component-feature-style-2 .theme-component-feature-item>p',
		'.theme-component-feature-circle .theme-component-feature-circle-circle>span:first-child',
		'.theme-component-feature-circle .theme-component-feature-circle-item>span.theme-component-feature-circle-item-label',
		'.theme-component-header-subheader .theme-component-header-subheader-subheader'
	)
);

TFElement::add
(
	'F06',
	array
	(
		'label'=>__('<i>[06]</i>Header H5','autoride'),
		'description'=>__('Usage:<br/>- header H5,<br/>- price of product.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(16,16,16,16,16),
		'font_weight'=>'400',
		'line_height'=>'1.54545em',
		'text_transform'=>'none'
	),
	array
	(
		'h5',
		'h5 a',
		'html .woocommerce div.product div.summary .price',
		'html .woocommerce div.product div.summary .price>*',
		'html .woocommerce ul.products li.product .woocommerce-LoopProduct-link span.price',
		'html .woocommerce-page ul.products li.product .woocommerce-LoopProduct-link span.price',
		'html .woocommerce ul.products li.product .woocommerce-LoopProduct-link span.price>*',
		'html .woocommerce-page ul.products li.product .woocommerce-LoopProduct-link span.price>*'
	)
);

TFElement::add
(
	'F07',
	array
	(
		'label'=>__('<i>[07]</i>Header H6','autoride'),
		'description'=>__('Usage:<br/>- header H6.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(16,16,16,16,16),
		'font_weight'=>'300',
		'line_height'=>'30px'
	),
	array
	(
		'h6',
		'h6 a'
	)
);

/***/

TFElement::add
(
	'F08',
	array
	(
		'label'=>__('<i>[08]</i>Header II','autoride'),
		'description'=>__('Usage:<br/>- post header.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(18,18,18,18,18),
		'font_weight'=>'700',
		'line_height'=>'30px',
		'text_transform'=>'capitalize'
	),
	array
	(
		'.theme-post-related .theme-post .theme-post-title',
		'.theme-post-related .theme-post .theme-post-title h4',
		'.theme-post-related .theme-post .theme-post-title h4 a',
		'.theme-blog-column .theme-post .theme-post-title h4',
		'.theme-blog-column .theme-post .theme-post-title h4 a'
	)
);

TFElement::add
(
	'F09',
	array
	(
		'label'=>__('<i>[09]</i>Header III','autoride'),
		'description'=>__('Usage:<br/>- value of item in "Counter boxes" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(50,50,46,35,24),
		'font_weight'=>'300',
		'line_height'=>'1.28em'
	),
	array
	(
		'#theme-full-screen-search-form *',
		'.theme-component-counter-box .theme-component-counter-box-item .theme-component-counter-box-item-value'
	)
);

TFElement::add
(
	'F10',
	array
	(
		'label'=>__('<i>[1]</i>Header IV','autoride'),
		'description'=>__('Usage:<br/>- header style I.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(50,50,46,35,24),
		'font_weight'=>'900',
		'line_height'=>'1.2em'
	),
	array
	(
		'.theme-header-style-1'
	)
);

TFElement::add
(
	'F11',
	array
	(
		'label'=>__('<i>[11]</i>Header V','autoride'),
		'description'=>__('Usage:<br/>- item header of "Features" (style 2) component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(14,14,14,14,14),
		'font_weight'=>'400',
		'line_height'=>'24px',
		'letter_spacing'=>'2px',
		'text_transform'=>'uppercase'
	),
	array
	(
		'.theme-component-feature.theme-component-feature-style-2 .theme-component-feature-item>.theme-component-feature-item-header'
	)
);

TFElement::add
(
	'F12',
	array
	(
		'label'=>__('<i>[12]</i>Header VI','autoride'),
		'description'=>__('Usage:<br/>- header of page placed on background image.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(50,50,46,35,24),
		'font_weight'=>'300',
		'line_height'=>'1.28em'
	),
	array
	(
		'.theme-page .theme-page-header .theme-page-header-title.theme-page-header-title-type-image>div>h1'
	)
);

TFElement::add
(
	'F13',
	array
	(
		'label'=>__('<i>[13]</i>Header VII','autoride'),
		'description'=>__('Usage:<br/>- page subheader (bread crumbs) placed on background image.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(14,14,14,14,14),
		'font_weight'=>'400',
		'line_height'=>'24px',
		'text_transform'=>'uppercase'
	),
	array
	(
		'.theme-component-counter-list .theme-component-counter-list-item>span',
		'.theme-page .theme-page-header .theme-page-header-title.theme-page-header-title-type-image>div>div',
		'.theme-page .theme-page-header .theme-page-header-title.theme-page-header-title-type-image>div>div a'
	)
);

TFElement::add
(
	'F14',
	array
	(
		'label'=>__('<i>[14]</i>Header VIII','autoride'),
		'description'=>__('Usage:<br/>- header H2 for component "Header & subheader".','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(40,40,36,32,28),
		'font_weight'=>'300',
		'line_height'=>'1.4em'
	),
	array
	(
		'.theme-component-header-subheader h2.theme-component-header-subheader-header'
	)
);


/***/

TFElement::add
(
	'F15',
	array
	(
		'label'=>__('<i>[15]</i>Menu I','autoride'),
		'description'=>__('Usage:<br/>- first level menu item.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(16,16,16,16,16),
		'font_weight'=>'400',
		'line_height'=>'26px',
		'text_transform'=>'uppercase'
	),
	array
	(
		'.theme-menu.theme-menu-default>ul>li>a',
		'.theme-menu-responsive-list>li>a>span:first-child+span'
	)
);


TFElement::add
(
	'F16',
	array
	(
		'label'=>__('<i>[16]</i>Menu II','autoride'),
		'description'=>__('Usage:<br/>- item of widget "Navigation Menu",<br/>- item of wooCommerce "My account" page menu,<br/>- item of second and next level menu.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(16,16,16,16,16),
		'font_weight'=>'400',
		'line_height'=>'26px'
	),
	array
	(
		'.widget_nav_menu ul li>a',
		'.woocommerce-MyAccount-navigation ul li>a',
		'.theme-menu.theme-menu-default>ul ul li a',
		'.theme-menu-responsive-list ul>li>a>span:first-child+span'
	)
);

/***/

TFElement::add
(
	'F17',
	array
	(
		'label'=>__('<i>[17]</i>Table I','autoride'),
		'description'=>__('Usage:<br/>- header of table.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(18,18,18,18,18),
		'font_weight'=>'400',
		'line_height'=>'30px'
	),
	array
	(
		'table tr th',
		'html .woocommerce table.shop_table tr th',
		'html .woocommerce table.shop_table tfoot td' 
	)
);

/***/

TFElement::add
(
	'F18',
	array
	(
		'label'=>__('<i>[18]</i>Label I','autoride'),
		'description'=>__('Usage:<br/>- large paragraph (style 2),<br/>- content of blockquote,<br/>- subheader of "Call To Action" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(28,24,24,19,19),
		'font_weight'=>'300',
		'line_height'=>'1.42857em'
	),
	array
	(
		'blockquote',
		'blockquote *',
		'.theme-gutenberg-block .wp-block-quote cite',
		'.theme-gutenberg-block .wp-block-quote.is-large p',
		'.theme-gutenberg-block .wp-block-quote.is-style-large p',
		'.theme-gutenberg-block .wp-block-pullquote p',
		'.theme-component-paragraph-large.theme-component-paragraph-large-style-2',
		'.theme-component-call-to-action.theme-component-call-to-action-style-1 .theme-component-call-to-action-box .theme-component-call-to-action-subheader'
	)
);

TFElement::add
(
	'F19',
	array
	(
		'label'=>__('<i>[19]</i>Label II','autoride'),
		'description'=>__('Usage:<br/>- author in "Blockquote" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(14,14,14,14,14),
		'font_weight'=>'400',
		'line_height'=>'40px',
		'letter_spacing'=>'2px',
		'text_transform'=>'uppercase'
	),
	array
	(
		'.theme-component-blockquote>div'
	)
);

TFElement::add
(
	'F20',
	array
	(
		'label'=>__('<i>[20]</i>Label III','autoride'),
		'description'=>__('Usage:<br/>- large paragraph (style 1),<br/>- content of testimonial in "Testimonials list" component (style 2),<br/>- subheader of text located in main circle of "Features circle" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(22,20,20,20,20),
		'font_weight'=>'300',
		'line_height'=>'1.63636em'
	),
	array
	(
		'.theme-component-paragraph-large.theme-component-paragraph-large-style-1',
		'.theme-component-testimonial-list.theme-component-testimonial-list-style-2 .theme-component-testimonial-list-item>p',
		'.theme-component-feature-circle .theme-component-feature-circle-circle>span+span'
	)
);

TFElement::add
(
	'F21',
	array
	(
		'label'=>__('<i>[21]</i>Label IV','autoride'),
		'description'=>__('Usage:<br/>- value of item in "Attributes table" component,<br/>- label used in "Meta icons" component (style 1),<br/>- text used in footer copyright section.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(15,15,15,15,15),
		'font_weight'=>'400',
		'line_height'=>'24px'
	),
	array
	(
		'.theme-text-copyright',
		'.theme-text-copyright a',
		'.theme-text-copyright a:hover',
		'html .woocommerce .woocommerce-product-attributes tr>td p',
		'.theme-component-attribute-table>ul>li>div:first-child+div',
		'.theme-component-meta-icon-list.theme-component-meta-icon-list-style-1>li>span+span>span'
	)
);

TFElement::add
(
	'F22',
	array
	(
		'label'=>__('<i>[22]</i>Label V','autoride'),
		'description'=>__('Usage:<br/>- label used in "Meta icons" component (style 2),<br/>- numer of passengers and bags in "Vehicle attribute" widget.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(16,16,16,16,16),
		'font_weight'=>'300',
		'line_height'=>'26px'
	),
	array
	(
		'.theme-component-meta-icon-list.theme-component-meta-icon-list-style-2>li>span+span',
		'.widget_theme_widget_vehicle_attribute>.theme-widget-vehicle-attribute-icon>div>span:first-child+span'
	)
);

TFElement::add
(
	'F23',
	array
	(
		'label'=>__('<i>[23]</i>Label VI','autoride'),
		'description'=>__('Usage:<br/>- label used in "Meta icons" component (style 3),<br/>- post date,<br/>- name of comment author and recipient,<br/>- comment date.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(14,14,14,14,14),
		'font_weight'=>'400',
		'line_height'=>'18px',
		'text_transform'=>'uppercase',
		'letter_spacing'=>'2px'
	),
	array
	(
		'html .woocommerce #reviews #comments ol.commentlist li .meta',
		'.theme-post .theme-post-date',
		'.theme-post .theme-post-date>a',
		'#comments #comments_list>ul>li .theme-comment-meta>.theme-comment-meta-author',
		'#comments #comments_list>ul>li .theme-comment-meta>.theme-comment-meta-author a',
		'#comments #comments_list>ul>li .theme-comment-meta>.theme-comment-meta-reply-to',
		'#comments #comments_list>ul>li .theme-comment-meta>.theme-comment-meta-reply-to a',
		'#comments #comments_list>ul>li .theme-comment-meta>.theme-comment-meta-date'
	)
);

TFElement::add
(
	'F24',
	array
	(
		'label'=>__('<i>[24]</i>Label VII','autoride'),
		'description'=>__('Usage:<br/>- content of "Text" and "RSS" widgets,<br/>- content of comment,<br/>- item of "List" (style 1 and 3) component,<br/>- description of driver in "Driver list" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(16,16,16,16,16),
		'font_weight'=>'300',
		'line_height'=>'26px'
	),
	array
	(
		'.widget_text .textwidget',
		'.widget_rss>ul>li>.rssSummary',
		'#comments #comments_list>ul>li .theme-comment-content',
		'#comments #comments_list>ul>li .theme-comment-content p a',
		'.theme-component-list.theme-component-list-style-1 ul li',
		'.theme-component-list.theme-component-list-style-3 ul li',
		'.theme-component-driver-list .theme-component-driver-list-item>.theme-component-driver-list-item-excerpt'
	)
);

TFElement::add
(
	'F25',
	array
	(
		'label'=>__('<i>[25]</i>Label VIII','autoride'),
		'description'=>__('Usage:<br/>- item of "List" (style 2) component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(18,18,18,18,18),
		'font_weight'=>'300',
		'line_height'=>'30px'
	),
	array
	(
		'.theme-component-list.theme-component-list-style-2 ul li'
	)
);

TFElement::add
(
	'F26',
	array
	(
		'label'=>__('<i>[26]</i>Label IX','autoride'),
		'description'=>__('Usage:<br/>- number of step in "Process list" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(28,28,28,28,28),
		'font_weight'=>'300',
		'line_height'=>'1'
	),
	array
	(
		'.theme-component-process-list .theme-component-process-list-item>div'
	)
);


TFElement::add
(
	'F27',
	array
	(
		'label'=>__('<i>[27]</i>Label X','autoride'),
		'description'=>__('Usage:<br/>- "Share" label in post content.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(14,14,14,14,14),
		'font_weight'=>'300',
		'line_height'=>'18px',
		'letter_spacing'=>'2px',
		'text_transform'=>'uppercase'
	),
	array
	(
		'.theme-post .theme-post-share>span'
	)
);

TFElement::add
(
	'F28',
	array
	(
		'label'=>__('<i>[28]</i>Label XI','autoride'),
		'description'=>''
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(12,12,12,12,12),
		'font_weight'=>'400',
		'line_height'=>'18px',
		'letter_spacing'=>'2px',
		'text_transform'=>'uppercase'
	),
	array
	(
		'.theme-post-navigation>a',
		'.theme-post .theme-post-meta',
		'.theme-post .theme-post-meta a',
		'.theme-post .theme-post-meta a:hover',
		'.widget_tag_cloud .tagcloud a',
		'.widget_product_tag_cloud .tagcloud a',
		'.wp-block-tag-cloud a',
		'.widget_meta ul>li a',
		'.widget_pages ul>li a',
		'.widget_recent_entries>ul>li>span',
		'ul.wp-block-latest-posts.wp-block-latest-posts__list>li time',
		'.widget_recent_comments>ul>li>span',
		'.widget_recent_comments>ul>li>span>a',
		'ol.wp-block-latest-comments>li .wp-block-latest-comments__comment-author',
		'.widget_products>ul.product_list_widget>li>ins',
		'.widget_products>ul.product_list_widget>li>del',
		'.widget_recent_review>sul.product_list_widget>li>ins',
		'.widget_recent_review>sul.product_list_widget>li>del',
		'.widget_top_rated_products>ul.product_list_widget>li>ins',
		'.widget_top_rated_products>ul.product_list_widget>li>del',
		'.widget_recently_viewed_products>ul.product_list_widget>li>ins',
		'.widget_recently_viewed_products>ul.product_list_widget>li>del',
		'.widget_archive>ul>li>a',
		'.wp-block-archives li>a',
		'.widget_categories ul>li>a',
		'.widget_product_categories ul>li>a',
		'.widget_rss>ul>li>.rss-date',
		'.widget_calendar>.calendar_wrap>table',
		'.widget_calendar>.calendar_wrap>table th',
		'.widget_calendar>.calendar_wrap>table a',
		'.wp-block-calendar table',
		'.wp-block-calendar table th',
		'.wp-block-calendar table a',
		'html .woocommerce .widget_rating_filter ul>li.wc-layered-nav-rating>a>span+span',
		'html .woocommerce .woocommerce-widget-layered-nav ul>li.woocommerce-widget-layered-nav-list__item>a',
		'.theme-component-recent-post>li>a>span.theme-component-recent-post-date>span'
	)
);

TFElement::add
(
	'F29',
	array
	(
		'label'=>__('<i>[29]</i>Label XII','autoride'),
		'description'=>__('Usage:<br/>- pagination item.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(14,14,14,14,14),
		'font_weight'=>'400',
		'line_height'=>'38px'
	),
	array
	(
		'.theme-pagination *',
		'.woocommerce nav.woocommerce-pagination *', 
		'.woocommerce-page nav.woocommerce-pagination *'
	)
);

TFElement::add
(
	'F30',
	array
	(
		'label'=>__('<i>[30]</i>Label XIII','autoride'),
		'description'=>__('Usage:<br/>- label of form fields,<br/>- category name in vehicle list,<br/>- period of experience in "Work experience" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(12,12,12,12,12),
		'font_weight'=>'400',
		'line_height'=>'1',
		'text_transform'=>'uppercase'
	),
	array
	(
		'.theme-form-field label',
		'.theme-vehicle-list .theme-vehicle-list-item .theme-vehicle-list-item-image>a>span:first-child>.theme-vehicle-list-item-category',
		'.theme-component-work-experience-list>ul>li>div:first-child+div>span:first-child',
		'.theme-component-work-experience-list>ul>li>div:first-child>span:first-child+span',
		'.wp-block-search .wp-block-search__label',
		'.widget_search form .screen-reader-text',
		'.widget_product_search form .screen-reader-text',
		'html .woocommerce #commentform label',
		'html .woocommerce form .form-row label',
		'html .woocommerce-page form .form-row label',
	)
);

TFElement::add
(
	'F31',
	array
	(
		'label'=>__('<i>[31]</i>Label XIV','autoride'),
		'description'=>__('Usage:<br/>- text of form elements,<br/>- item title in widgets "Recent posts", "Recent comments", "Recent Product Reviews", "Recent Viewed Products", "Products", "Products by Rating",  .','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(18,18,18,18,18),
		'font_weight'=>'700',
		'line_height'=>'30px'
	),
	array
	(
		'select',
		'textarea',
		'input[type="tel"]',
		'input[type="text"]',
		'input[type="email"]',
		'input[type="search"]',
		'input[type="password"]',
		'.widget_rss>ul>li>a',
		'.wp-block-rss>li.wp-block-rss__item>.wp-block-rss__item-title>a',
		'.widget_search input[type="text"]',
		'.wp-block-search input[type="search"]',
		'.widget_product_search input[type="search"]',
		'.widget_recent_entries>ul>li>a',
		'ul.wp-block-latest-posts.wp-block-latest-posts__list>li a',
		'.widget_recent_comments>ul>li>a',
		'ol.wp-block-latest-comments>li .wp-block-latest-comments__comment-link',
		'.widget_products>ul.product_list_widget>li>a',
		'.widget_recent_review>ul.product_list_widget>li>a',
		'.widget_top_rated_products>ul.product_list_widget>li>a',
		'.widget_recently_viewed_products>ul.product_list_widget>li>a',
		'.theme-component-recent-post>li>a>span.theme-component-recent-post-header>span',
		'html .select2-container--default .select2-selection--single .select2-selection__rendered'
	)
);

TFElement::add
(
	'F32',
	array
	(
		'label'=>__('<i>[32]</i>Label XV','autoride'),
		'description'=>__('Usage:<br/>- button in comment.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(12,12,12,12,12),
		'font_weight'=>'400',
		'line_height'=>'18px',
		'text_transform'=>'uppercase'
	),
	array
	(
		'#comments #comments_list>ul>li .theme-comment-content .theme-component-button>a'
	)
);

TFElement::add
(
	'F33',
	array
	(
		'label'=>__('<i>[33]</i>Label XVI','autoride'),
		'description'=>__('Usage:<br/>- number of passengers and bags in vehicle list.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(14,14,14,14,14),
		'font_weight'=>'400',
		'line_height'=>'30px'
	),
	array
	(
		'.theme-vehicle-list .theme-vehicle-list-item .theme-vehicle-list-item-meta .theme-circle'
	)
);

TFElement::add
(
	'F34',
	array
	(
		'label'=>__('<i>[34]</i>Label XVII','autoride'),
		'description'=>__('Usage:<br/>- header of table in "Attribute table" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(12,12,12,12,12),
		'font_weight'=>'400',
		'line_height'=>'20px',
		'text_transform'=>'uppercase'
	),
	array
	(
		'html .woocommerce .woocommerce-product-attributes tr>th',
		'.theme-component-attribute-table>ul>li>div:first-child',
	)
);

TFElement::add
(
	'F35',
	array
	(
		'label'=>__('<i>[35]</i>Label XVIII','autoride'),
		'description'=>__('Usage:<br/>- number of unit (years) in "Work experience" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(50,50,50,50,50),
		'font_weight'=>'300',
		'line_height'=>'1'
	),
	array
	(
		'.theme-component-work-experience-list>ul>li>div:first-child>span:first-child'
	)
);

TFElement::add
(
	'F36',
	array
	(
		'label'=>__('<i>[36]</i>Label XIX','autoride'),
		'description'=>__('Usage:<br/>- name of company in "Work experience" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(18,18,18,18,18),
		'font_weight'=>'300',
		'line_height'=>'30px'
	),
	array
	(
		'.theme-component-work-experience-list>ul>li>div:first-child+div>span:first-child+span'
	)
);

TFElement::add
(
	'F37',
	array
	(
		'label'=>__('<i>[37]</i>Label XX','autoride'),
		'description'=>__('Usage:<br/>- name of author in "Testimonial list" component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(14,14,14,14,14),
		'font_weight'=>'400',
		'line_height'=>'18px',
		'letter_spacing'=>'2px',
		'text_transform'=>'uppercase'
	),
	array
	(
		'.theme-component-testimonial-list.theme-component-testimonial-list-style-1 .theme-component-testimonial-list-item>div',
		'.theme-component-testimonial-list.theme-component-testimonial-list-style-2 .theme-component-testimonial-list-item>div'
	)
);

TFElement::add
(
	'F38',
	array
	(
		'label'=>__('<i>[38]</i>Label XXI','autoride'),
		'description'=>__('Usage:<br/>- label "Enlarge map" of button in "Google Maps" (type 2) component.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(14,14,14,14,14),
		'font_weight'=>'400',
		'line_height'=>'24px',
		'text_transform'=>'uppercase'
	),
	array
	(
		'.theme-component-google-map.theme-component-google-map-type-2 .theme-component-google-map-map-box>a',
		'.theme-component-google-map.theme-component-google-map-type-2 .theme-component-google-map-map-box>a:hover'
	)
);

TFElement::add
(
	'F39',
	array
	(
		'label'=>__('<i>[39]</i>Label XXII','autoride'),
		'description'=>__('Usage:<br/>- label of button.','autoride')
	),
	array
	(
		'font_family_google'=>'Lato',
		'font_family_system'=>'',
		'font_size'=>array(14,14,14,14,14),
		'font_weight'=>'400',
		'line_height'=>'1em',
		'text_transform'=>'uppercase'
	),
	array
	(
		'html .woocommerce .button',
		'html .woocommerce a.button',
		'html .woocommerce button.button',
		'html .woocommerce .button:hover',
		'html .woocommerce .button.disabled',
		'html .woocommerce .button.disabled:hover',
		'html .woocommerce .button:disabled[disabled]',
		'html .woocommerce .button:disabled[disabled]:hover',
		'html .woocommerce #respond input#submit',
		'html .woocommerce #respond input#submit:hover',
		'html #add_payment_method .wc-proceed-to-checkout a.checkout-button', 
		'html .woocommerce-cart .wc-proceed-to-checkout a.checkout-button', 
		'html .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button',
		'html .woocommerce .widget_price_filter .price_slider_amount .button',
		'.theme-component-button>a',
		'input.theme-component-button',
		'.theme-gutenberg-block .wp-block-file .wp-block-file__button'
	)
);