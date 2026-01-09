<?php return array (
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'app' => 
  array (
    'name' => 'Vida Arte y Cultura',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://127.0.0.1:8000',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'es',
    'fallback_locale' => 'es',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:YUP9XVe9gSwGtCsQDAGfmC6w5Qv/RLhomPesDpd8ccw=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
      6 => 'Illuminate\\Cookie\\CookieServiceProvider',
      7 => 'Illuminate\\Database\\DatabaseServiceProvider',
      8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      11 => 'Illuminate\\Hashing\\HashServiceProvider',
      12 => 'Illuminate\\Mail\\MailServiceProvider',
      13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      17 => 'Illuminate\\Queue\\QueueServiceProvider',
      18 => 'Illuminate\\Redis\\RedisServiceProvider',
      19 => 'Illuminate\\Session\\SessionServiceProvider',
      20 => 'Illuminate\\Translation\\TranslationServiceProvider',
      21 => 'Illuminate\\Validation\\ValidationServiceProvider',
      22 => 'Illuminate\\View\\ViewServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\AuthServiceProvider',
      25 => 'App\\Providers\\EventServiceProvider',
      26 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Uri' => 'Illuminate\\Support\\Uri',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
      'staff' => 
      array (
        'driver' => 'session',
        'provider' => 'staff',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
      'staff' => 
      array (
        'driver' => 'eloquent',
        'model' => 'Lunar\\Admin\\Models\\Staff',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'host' => 'api-mt1.pusher.com',
          'port' => '443',
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\Users\\edwar\\Working\\vac\\storage\\framework/cache/data',
        'lock_path' => 'C:\\Users\\edwar\\Working\\vac\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
      'apc' => 
      array (
        'driver' => 'apc',
      ),
    ),
    'prefix' => 'vida_arte_y_cultura_cache_',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'vac',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'vac',
        'username' => 'root',
        'password' => 'YToNCeDniAGeRCU',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'vac',
        'username' => 'root',
        'password' => 'YToNCeDniAGeRCU',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'vac',
        'username' => 'root',
        'password' => 'YToNCeDniAGeRCU',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'vac',
        'username' => 'root',
        'password' => 'YToNCeDniAGeRCU',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'vida_arte_y_cultura_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\Users\\edwar\\Working\\vac\\storage\\app',
        'throw' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\Users\\edwar\\Working\\vac\\storage\\app/public',
        'url' => 'http://127.0.0.1:8000/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
      ),
    ),
    'links' => 
    array (
      'C:\\Users\\edwar\\Working\\vac\\public\\storage' => 'C:\\Users\\edwar\\Working\\vac\\storage\\app/public',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 12,
      'verify' => true,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
    ),
    'rehash_on_login' => true,
  ),
  'livewire' => 
  array (
    'class_namespace' => 'App\\Livewire',
    'view_path' => 'C:\\Users\\edwar\\Working\\vac\\resources\\views/livewire',
    'layout' => 'layouts.storefront',
    'lazy_placeholder' => NULL,
    'temporary_file_upload' => 
    array (
      'disk' => NULL,
      'rules' => NULL,
      'directory' => NULL,
      'middleware' => NULL,
      'preview_mimes' => 
      array (
        0 => 'png',
        1 => 'gif',
        2 => 'bmp',
        3 => 'svg',
        4 => 'wav',
        5 => 'mp4',
        6 => 'mov',
        7 => 'avi',
        8 => 'wmv',
        9 => 'mp3',
        10 => 'm4a',
        11 => 'jpg',
        12 => 'jpeg',
        13 => 'mpga',
        14 => 'webp',
        15 => 'wma',
      ),
      'max_upload_time' => 5,
    ),
    'render_on_redirect' => false,
    'legacy_model_binding' => true,
    'inject_assets' => true,
    'navigate' => 
    array (
      'show_progress_bar' => true,
      'progress_bar_color' => '#2299dd',
    ),
    'inject_morph_markers' => true,
    'smart_wire_keys' => false,
    'pagination_theme' => 'tailwind',
    'release_token' => 'a',
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
        'replace_placeholders' => true,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\Users\\edwar\\Working\\vac\\storage\\logs/laravel.log',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\edwar\\Working\\vac\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'C:\\Users\\edwar\\Working\\vac\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'lunar' => 
  array (
    'cart' => 
    array (
      'fingerprint_generator' => 'Lunar\\Actions\\Carts\\GenerateFingerprint',
      'auth_policy' => 'merge',
      'pipelines' => 
      array (
        'cart' => 
        array (
          0 => 'Lunar\\Pipelines\\Cart\\CalculateLines',
          1 => 'Lunar\\Pipelines\\Cart\\ApplyShipping',
          2 => 'Lunar\\Pipelines\\Cart\\ApplyDiscounts',
          3 => 'Lunar\\Pipelines\\Cart\\CalculateTax',
          4 => 'Lunar\\Pipelines\\Cart\\Calculate',
        ),
        'cart_lines' => 
        array (
          0 => 'Lunar\\Pipelines\\CartLine\\GetUnitPrice',
        ),
      ),
      'actions' => 
      array (
        'add_to_cart' => 'Lunar\\Actions\\Carts\\AddOrUpdatePurchasable',
        'get_existing_cart_line' => 'Lunar\\Actions\\Carts\\GetExistingCartLine',
        'update_cart_line' => 'Lunar\\Actions\\Carts\\UpdateCartLine',
        'remove_from_cart' => 'Lunar\\Actions\\Carts\\RemovePurchasable',
        'add_address' => 'Lunar\\Actions\\Carts\\AddAddress',
        'set_shipping_option' => 'Lunar\\Actions\\Carts\\SetShippingOption',
        'order_create' => 'Lunar\\Actions\\Carts\\CreateOrder',
      ),
      'validators' => 
      array (
        'add_to_cart' => 
        array (
          0 => 'Lunar\\Validation\\CartLine\\CartLineQuantity',
          1 => 'Lunar\\Validation\\CartLine\\CartLineStock',
        ),
        'update_cart_line' => 
        array (
          0 => 'Lunar\\Validation\\CartLine\\CartLineQuantity',
          1 => 'Lunar\\Validation\\CartLine\\CartLineStock',
        ),
        'remove_from_cart' => 
        array (
        ),
        'set_shipping_option' => 
        array (
          0 => 'Lunar\\Validation\\Cart\\ShippingOptionValidator',
        ),
        'order_create' => 
        array (
          0 => 'Lunar\\Validation\\Cart\\ValidateCartForOrderCreation',
        ),
      ),
      'eager_load' => 
      array (
        0 => 'currency',
        1 => 'lines.purchasable.taxClass',
        2 => 'lines.purchasable.values',
        3 => 'lines.purchasable.product.thumbnail',
        4 => 'lines.purchasable.prices.currency',
        5 => 'lines.purchasable.prices.priceable',
        6 => 'lines.purchasable.product',
        7 => 'lines.cart.currency',
      ),
      'prune_tables' => 
      array (
        'enabled' => false,
        'pipelines' => 
        array (
          0 => 'Lunar\\Pipelines\\CartPrune\\PruneAfter',
          1 => 'Lunar\\Pipelines\\CartPrune\\WithoutOrders',
          2 => 'Lunar\\Pipelines\\CartPrune\\WhereNotMerged',
        ),
        'prune_interval' => 90,
      ),
    ),
    'cart_session' => 
    array (
      'session_key' => 'lunar_cart',
      'auto_create' => false,
      'allow_multiple_orders_per_cart' => false,
      'delete_on_forget' => true,
    ),
    'database' => 
    array (
      'connection' => NULL,
      'table_prefix' => 'vac_',
      'morph_prefix' => NULL,
      'users_id_type' => 'bigint',
      'disable_migrations' => false,
    ),
    'discounts' => 
    array (
      'coupon_validator' => 'Lunar\\Base\\Validation\\CouponValidator',
    ),
    'media' => 
    array (
      'definitions' => 
      array (
        'asset' => 'Lunar\\Base\\StandardMediaDefinitions',
        'brand' => 'Lunar\\Base\\StandardMediaDefinitions',
        'collection' => 'Lunar\\Base\\StandardMediaDefinitions',
        'product' => 'Lunar\\Base\\StandardMediaDefinitions',
        'product-option' => 'Lunar\\Base\\StandardMediaDefinitions',
        'product-option-value' => 'Lunar\\Base\\StandardMediaDefinitions',
      ),
      'collection' => 'images',
      'fallback' => 
      array (
        'url' => NULL,
        'path' => NULL,
      ),
    ),
    'orders' => 
    array (
      'reference_format' => 
      array (
        'prefix' => NULL,
        'padding_direction' => 0,
        'padding_character' => '0',
        'length' => 8,
      ),
      'reference_generator' => 'Lunar\\Base\\OrderReferenceGenerator',
      'draft_status' => 'awaiting-payment',
      'statuses' => 
      array (
        'awaiting-payment' => 
        array (
          'label' => 'Awaiting Payment',
          'color' => '#848a8c',
          'mailers' => 
          array (
          ),
          'notifications' => 
          array (
          ),
          'favourite' => true,
        ),
        'payment-offline' => 
        array (
          'label' => 'Payment Offline',
          'color' => '#0A81D7',
          'mailers' => 
          array (
          ),
          'notifications' => 
          array (
          ),
          'favourite' => true,
        ),
        'payment-received' => 
        array (
          'label' => 'Payment Received',
          'color' => '#6a67ce',
          'mailers' => 
          array (
          ),
          'notifications' => 
          array (
          ),
          'favourite' => true,
        ),
        'dispatched' => 
        array (
          'label' => 'Dispatched',
          'mailers' => 
          array (
          ),
          'notifications' => 
          array (
          ),
          'favourite' => true,
        ),
      ),
      'pipelines' => 
      array (
        'creation' => 
        array (
          0 => 'Lunar\\Pipelines\\Order\\Creation\\FillOrderFromCart',
          1 => 'Lunar\\Pipelines\\Order\\Creation\\CreateOrderLines',
          2 => 'Lunar\\Pipelines\\Order\\Creation\\CreateOrderAddresses',
          3 => 'Lunar\\Pipelines\\Order\\Creation\\CreateShippingLine',
          4 => 'Lunar\\Pipelines\\Order\\Creation\\CleanUpOrderLines',
          5 => 'Lunar\\Pipelines\\Order\\Creation\\MapDiscountBreakdown',
        ),
      ),
    ),
    'panel' => 
    array (
      'enable_variants' => true,
      'pdf_rendering' => 'download',
      'scout_enabled' => false,
      'order_count_statuses' => 
      array (
        0 => 'payment-received',
      ),
    ),
    'payments' => 
    array (
      'default' => 'cash-in-hand',
      'types' => 
      array (
        'cash-in-hand' => 
        array (
          'driver' => 'offline',
          'authorized' => 'payment-offline',
        ),
      ),
    ),
    'pricing' => 
    array (
      'stored_inclusive_of_tax' => false,
      'formatter' => 'Lunar\\Pricing\\DefaultPriceFormatter',
      'pipelines' => 
      array (
      ),
    ),
    'products' => 
    array (
      'association_types_enum' => 'Lunar\\Base\\Enums\\ProductAssociation',
    ),
    'search' => 
    array (
      'models' => 
      array (
        0 => 'Lunar\\Models\\Brand',
        1 => 'Lunar\\Models\\Collection',
        2 => 'Lunar\\Models\\Customer',
        3 => 'Lunar\\Models\\Order',
        4 => 'Lunar\\Models\\Product',
        5 => 'Lunar\\Models\\ProductOption',
      ),
      'engine_map' => 
      array (
      ),
      'indexers' => 
      array (
        'Lunar\\Models\\Brand' => 'Lunar\\Search\\BrandIndexer',
        'Lunar\\Models\\Collection' => 'Lunar\\Search\\CollectionIndexer',
        'Lunar\\Models\\Customer' => 'Lunar\\Search\\CustomerIndexer',
        'Lunar\\Models\\Order' => 'Lunar\\Search\\OrderIndexer',
        'Lunar\\Models\\Product' => 'Lunar\\Search\\ProductIndexer',
        'Lunar\\Models\\ProductOption' => 'Lunar\\Search\\ProductOptionIndexer',
      ),
    ),
    'shipping' => 
    array (
      'measurements' => 
      array (
        'length' => 
        array (
          'm' => 
          array (
            'format' => '1,0.000 m',
            'unit' => 1.0,
          ),
          'mm' => 
          array (
            'format' => '1,0.000 mm',
            'unit' => 1000,
          ),
          'cm' => 
          array (
            'format' => '1!0 cm',
            'unit' => 100,
          ),
          'ft' => 
          array (
            'format' => '1,0.00 ft.',
            'unit' => 3.28084,
          ),
          'in' => 
          array (
            'format' => '1,0.00 in.',
            'unit' => 39.3701,
          ),
        ),
        'area' => 
        array (
          'sqm' => 
          array (
            'format' => '1,00.00 sq m',
            'unit' => 1,
          ),
        ),
        'weight' => 
        array (
          'kg' => 
          array (
            'format' => '1,0.00 kg',
            'unit' => 1.0,
          ),
          'g' => 
          array (
            'format' => '1,0.00 g',
            'unit' => 1000.0,
          ),
          'lbs' => 
          array (
            'format' => '1,0.00 lbs',
            'unit' => 2.20462,
          ),
        ),
        'volume' => 
        array (
          'l' => 
          array (
            'format' => '1,00.00l',
            'unit' => 1,
          ),
          'ml' => 
          array (
            'format' => '1,00.000ml',
            'unit' => 1000,
          ),
          'gal' => 
          array (
            'format' => '1,00.000gal',
            'unit' => 0.264172,
          ),
          'floz' => 
          array (
            'format' => '1,00.000Fl oz.',
            'unit' => 33.814,
          ),
        ),
      ),
    ),
    'taxes' => 
    array (
      'driver' => 'system',
    ),
    'urls' => 
    array (
      'required' => true,
      'generator' => 'Lunar\\Generators\\UrlGenerator',
    ),
    'shipping-tables' => 
    array (
      'enabled' => true,
      'shipping_rate_tax_calculation' => 'default',
    ),
    'stripe' => 
    array (
      'webhook_path' => 'stripe/webhook',
      'policy' => 'automatic',
      'sync_addresses' => true,
      'status_mapping' => 
      array (
        'requires_capture' => 'requires-capture',
        'canceled' => 'cancelled',
        'processing' => 'processing',
        'requires_action' => 'awaiting-payment',
        'requires_confirmation' => 'auth-pending',
        'requires_payment_method' => 'failed',
        'succeeded' => 'payment-received',
      ),
      'actions' => 
      array (
        'store_charges' => 'Lunar\\Stripe\\Actions\\StoreCharges',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'url' => NULL,
        'host' => 'mailpit',
        'port' => '1025',
        'encryption' => NULL,
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
        'local_domain' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
    ),
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Vida Arte y Cultura',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\Users\\edwar\\Working\\vac\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'media-library' => 
  array (
    'disk_name' => 'public',
    'max_file_size' => 10485760,
    'queue_connection_name' => 'sync',
    'queue_name' => '',
    'queue_conversions_by_default' => true,
    'queue_conversions_after_database_commit' => true,
    'media_model' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
    'media_observer' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Observers\\MediaObserver',
    'use_default_collection_serialization' => false,
    'temporary_upload_model' => 'Spatie\\MediaLibraryPro\\Models\\TemporaryUpload',
    'enable_temporary_uploads_session_affinity' => true,
    'generate_thumbnails_for_temporary_uploads' => true,
    'file_namer' => 'Spatie\\MediaLibrary\\Support\\FileNamer\\DefaultFileNamer',
    'path_generator' => 'Spatie\\MediaLibrary\\Support\\PathGenerator\\DefaultPathGenerator',
    'file_remover_class' => 'Spatie\\MediaLibrary\\Support\\FileRemover\\DefaultFileRemover',
    'custom_path_generators' => 
    array (
    ),
    'url_generator' => 'Spatie\\MediaLibrary\\Support\\UrlGenerator\\DefaultUrlGenerator',
    'moves_media_on_update' => false,
    'version_urls' => false,
    'image_optimizers' => 
    array (
      'Spatie\\ImageOptimizer\\Optimizers\\Jpegoptim' => 
      array (
        0 => '-m85',
        1 => '--force',
        2 => '--strip-all',
        3 => '--all-progressive',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Pngquant' => 
      array (
        0 => '--force',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Optipng' => 
      array (
        0 => '-i0',
        1 => '-o2',
        2 => '-quiet',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Svgo' => 
      array (
        0 => '--disable=cleanupIDs',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Gifsicle' => 
      array (
        0 => '-b',
        1 => '-O3',
      ),
      'Spatie\\ImageOptimizer\\Optimizers\\Cwebp' => 
      array (
        0 => '-m 6',
        1 => '-pass 10',
        2 => '-mt',
        3 => '-q 90',
      ),
    ),
    'image_generators' => 
    array (
      0 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Image',
      1 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Webp',
      2 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Pdf',
      3 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Svg',
      4 => 'Spatie\\MediaLibrary\\Conversions\\ImageGenerators\\Video',
    ),
    'temporary_directory_path' => NULL,
    'image_driver' => 'gd',
    'ffmpeg_path' => '/usr/bin/ffmpeg',
    'ffprobe_path' => '/usr/bin/ffprobe',
    'ffmpeg_timeout' => 900,
    'ffmpeg_threads' => 0,
    'jobs' => 
    array (
      'perform_conversions' => 'Spatie\\MediaLibrary\\Conversions\\Jobs\\PerformConversionsJob',
      'generate_responsive_images' => 'Spatie\\MediaLibrary\\ResponsiveImages\\Jobs\\GenerateResponsiveImagesJob',
    ),
    'media_downloader' => 'Spatie\\MediaLibrary\\Downloaders\\DefaultDownloader',
    'media_downloader_ssl' => true,
    'temporary_url_default_lifetime' => 5,
    'remote' => 
    array (
      'extra_headers' => 
      array (
        'CacheControl' => 'max-age=604800',
      ),
    ),
    'responsive_images' => 
    array (
      'width_calculator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\WidthCalculator\\FileSizeOptimizedWidthCalculator',
      'use_tiny_placeholders' => true,
      'tiny_placeholder_generator' => 'Spatie\\MediaLibrary\\ResponsiveImages\\TinyPlaceholderGenerator\\Blurred',
    ),
    'enable_vapor_uploads' => false,
    'default_loading_attribute_value' => NULL,
    'prefix' => '',
    'force_lazy_loading' => true,
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'role_pivot_key' => NULL,
      'permission_pivot_key' => NULL,
      'model_morph_key' => 'model_id',
      'team_foreign_key' => 'team_id',
    ),
    'register_permission_check_method' => true,
    'register_octane_reset_listener' => false,
    'events_enabled' => false,
    'teams' => false,
    'team_resolver' => 'Spatie\\Permission\\DefaultTeamResolver',
    'use_passport_client_credentials' => false,
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      \DateInterval::__set_state(array(
         'from_string' => true,
         'date_string' => '24 hours',
      )),
      'key' => 'spatie.permission.cache',
      'store' => 'default',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'batching' => 
    array (
      'database' => 'mysql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => '127.0.0.1:8000',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'authenticate_session' => 'Laravel\\Sanctum\\Http\\Middleware\\AuthenticateSession',
      'encrypt_cookies' => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
      'validate_csrf_token' => 'Illuminate\\Foundation\\Http\\Middleware\\ValidateCsrfToken',
    ),
  ),
  'scout' => 
  array (
    'driver' => 'meilisearch',
    'prefix' => 'demo_store_',
    'queue' => false,
    'after_commit' => false,
    'chunk' => 
    array (
      'searchable' => 500,
      'unsearchable' => 500,
    ),
    'soft_delete' => false,
    'identify' => false,
    'algolia' => 
    array (
      'id' => '',
      'secret' => '',
    ),
    'meilisearch' => 
    array (
      'host' => 'http://127.0.0.1:7700',
      'key' => 'masterKey123',
      'index-settings' => 
      array (
      ),
    ),
    'typesense' => 
    array (
      'client-settings' => 
      array (
        'api_key' => 'xyz',
        'nodes' => 
        array (
          0 => 
          array (
            'host' => 'localhost',
            'port' => '8108',
            'path' => '',
            'protocol' => 'http',
          ),
        ),
        'nearest_node' => 
        array (
          'host' => 'localhost',
          'port' => '8108',
          'path' => '',
          'protocol' => 'http',
        ),
        'connection_timeout_seconds' => 2,
        'healthcheck_interval_seconds' => 30,
        'num_retries' => 3,
        'retry_interval_seconds' => 1,
      ),
      'model-settings' => 
      array (
      ),
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
      'scheme' => 'https',
    ),
    'stripe' => 
    array (
      'public_key' => '',
      'key' => '',
    ),
    'instagram' => 
    array (
      'feed' => 'https://www.instagram.com/vacultura?igsh=MXFwbWM0bGg1Mnlwbw%3D%3D',
      'url' => 'https://www.instagram.com/vacultura/',
    ),
    'spotify' => 
    array (
      'podcast_url' => 'https://open.spotify.com/user/g6jvoqid6w27i7k4lflwip32e?si=961df12986e448dc',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\Users\\edwar\\Working\\vac\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'vida_arte_y_cultura_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\Users\\edwar\\Working\\vac\\resources\\views',
    ),
    'compiled' => 'C:\\Users\\edwar\\Working\\vac\\storage\\framework\\views',
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => 'C:\\Users\\edwar\\Working\\vac\\storage\\fonts',
      'font_cache' => 'C:\\Users\\edwar\\Working\\vac\\storage\\fonts',
      'temp_dir' => 'C:\\Users\\edwar\\AppData\\Local\\Temp',
      'chroot' => 'C:\\Users\\edwar\\Working\\vac',
      'allowed_protocols' => 
      array (
        'data://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'artifactPathValidation' => NULL,
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => false,
      'allowed_remote_hosts' => NULL,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'blade-heroicons' => 
  array (
    'prefix' => 'heroicon',
    'fallback' => '',
    'class' => '',
    'attributes' => 
    array (
    ),
  ),
  'blade-icons' => 
  array (
    'sets' => 
    array (
    ),
    'class' => '',
    'attributes' => 
    array (
    ),
    'fallback' => '',
    'components' => 
    array (
      'disabled' => false,
      'default' => 'icon',
    ),
  ),
  'cartalyst' => 
  array (
    'converter' => 
    array (
      'measurements' => 
      array (
        'area' => 
        array (
          'sqm' => 
          array (
            'format' => '1,00.00 sq m',
            'unit' => 1,
          ),
          'acre' => 
          array (
            'format' => '1,00.000 ac',
            'unit' => 0.000247105,
          ),
        ),
        'currency' => 
        array (
          'usd' => 
          array (
            'format' => '$1,0.00',
          ),
          'eur' => 
          array (
            'format' => '&euro;1,0.00',
          ),
          'gbp' => 
          array (
            'format' => '&pound;1,0.00',
          ),
        ),
        'length' => 
        array (
          'km' => 
          array (
            'format' => '1,0.000 km',
            'unit' => 0.001,
          ),
          'mi' => 
          array (
            'format' => '1,0.000 mi.',
            'unit' => 0.000621371,
          ),
          'm' => 
          array (
            'format' => '1,0.000 m',
            'unit' => 1.0,
          ),
          'cm' => 
          array (
            'format' => '1!0 cm',
            'unit' => 100,
          ),
          'mm' => 
          array (
            'format' => '1,0.00 mm',
            'unit' => 1000,
          ),
          'ft' => 
          array (
            'format' => '1,0.00 ft.',
            'unit' => 3.28084,
          ),
          'in' => 
          array (
            'format' => '1,0.00 in.',
            'unit' => 39.3701,
          ),
        ),
        'weight' => 
        array (
          'kg' => 
          array (
            'format' => '1,0.00 kg',
            'unit' => 1.0,
          ),
          'g' => 
          array (
            'format' => '1,0.00 g',
            'unit' => 1000.0,
          ),
        ),
        'temperature' => 
        array (
          'c' => 
          array (
            'format' => '1,0.00 C',
            'unit' => 1.0,
          ),
          'f' => 
          array (
            'format' => '1,0.00 °F',
            'unit' => 1.8,
            'offset' => 32,
          ),
          'k' => 
          array (
            'format' => '1,0.00 K',
            'unit' => 1.0,
            'offset' => 273.15,
          ),
          'rankine' => 
          array (
            'format' => '1,0.00 °R',
            'unit' => 1.8,
            'offset' => 491.67,
          ),
          'romer' => 
          array (
            'format' => '1,0.00 °Rø',
            'unit' => 0.525,
            'offset' => 7.5,
          ),
        ),
      ),
      'expires' => 60,
      'exchangers' => 
      array (
        'default' => 'native',
        'openexchangerates' => 
        array (
          'app_id' => NULL,
        ),
      ),
    ),
  ),
  'filament' => 
  array (
    'broadcasting' => 
    array (
    ),
    'default_filesystem_disk' => 'public',
    'assets_path' => NULL,
    'cache_path' => 'C:\\Users\\edwar\\Working\\vac\\bootstrap/cache/filament',
    'livewire_loading_delay' => 'default',
    'system_route_prefix' => 'filament',
  ),
  'filament-apex-charts' => 
  array (
    'chart_options' => 
    array (
      0 => 'Empty',
      1 => 'Area',
      2 => 'Bar',
      3 => 'Boxplot',
      4 => 'Bubble',
      5 => 'Candlestick',
      6 => 'Column',
      7 => 'Donut',
      8 => 'Heatmap',
      9 => 'Line',
      10 => 'Mixed-LineAndColumn',
      11 => 'Pie',
      12 => 'PolarArea',
      13 => 'Radar',
      14 => 'Radialbar',
      15 => 'RangeArea',
      16 => 'Scatter',
      17 => 'TimelineRangeBars',
      18 => 'Treemap',
      19 => 'Funnel',
    ),
  ),
  'activitylog' => 
  array (
    'enabled' => true,
    'delete_records_older_than_days' => 365,
    'default_log_name' => 'default',
    'default_auth_driver' => NULL,
    'subject_returns_soft_deleted_models' => false,
    'activity_model' => 'Spatie\\Activitylog\\Models\\Activity',
    'table_name' => 'activity_log',
    'database_connection' => NULL,
  ),
  'passkeys' => 
  array (
    'redirect_to_after_login' => '/dashboard',
    'actions' => 
    array (
      'generate_passkey_register_options' => 'Spatie\\LaravelPasskeys\\Actions\\GeneratePasskeyRegisterOptionsAction',
      'store_passkey' => 'Spatie\\LaravelPasskeys\\Actions\\StorePasskeyAction',
      'generate_passkey_authentication_options' => 'Spatie\\LaravelPasskeys\\Actions\\GeneratePasskeyAuthenticationOptionsAction',
      'find_passkey' => 'Spatie\\LaravelPasskeys\\Actions\\FindPasskeyToAuthenticateAction',
      'configure_ceremony_step_manager_factory' => 'Spatie\\LaravelPasskeys\\Actions\\ConfigureCeremonyStepManagerFactoryAction',
    ),
    'relying_party' => 
    array (
      'name' => 'Vida Arte y Cultura',
      'id' => '127.0.0.1',
      'icon' => NULL,
    ),
    'models' => 
    array (
      'passkey' => 'Spatie\\LaravelPasskeys\\Models\\Passkey',
      'authenticatable' => 'App\\Models\\User',
    ),
  ),
  'structure-discoverer' => 
  array (
    'ignored_files' => 
    array (
    ),
    'structure_scout_directories' => 
    array (
      0 => 'C:\\Users\\edwar\\Working\\vac\\app',
    ),
    'cache' => 
    array (
      'driver' => 'Spatie\\StructureDiscoverer\\Cache\\LaravelDiscoverCacheDriver',
      'store' => NULL,
    ),
  ),
  'blade-lucide-icons' => 
  array (
    'prefix' => 'lucide',
    'fallback' => '',
    'class' => '',
    'attributes' => 
    array (
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
