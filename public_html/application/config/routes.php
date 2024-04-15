<?php


return [
    '' => [
      'controller' => 'main',
      'action' => 'index'
    ],
  'about' => [
      'controller' => 'main',
      'action' => 'about'
      ],
    'contact' => [
        'controller' => 'main',
        'action' => 'contact'
    ],
    'car/{id:\d+}' => [
      'controller' => 'main',
      'action' => 'car'
      ],
    'cart' => [
        'controller' => 'cart',
        'action' => 'index'
    ],

    'cart/add/{id:\d+}' => [
      'controller' => 'cart',
      'action' => 'add'
    ],
    'cart/promo' => [
        'controller' => 'cart',
        'action' => 'promo'
    ],

    'user/add' => [
      'controller' => 'user',
      'action' => 'add'
    ],
    'user/{id:\d+}' => [
      'controller' => 'user',
      'action' => 'index'
    ],
    'orders' => [
        'controller' => 'orders',
        'action' => 'index'
    ],
    'orders/add' => [
      'controller' => 'orders',
      'action' => 'add'
    ],

    //AdminController
    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],
    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],
    'admin/add' => [
        'controller' => 'admin',
        'action' => 'add',
    ],
    'admin/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
    ],
    'admin/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
    ],
    'admin/cars' =>[
        'controller' => 'admin',
        'action' => 'cars'
    ],
    'admin/car/{id:\d+}' =>[
        'controller' => 'admin',
        'action' => 'car'
    ],
    'admin/car/{id:\d+}/save' =>[
        'controller' => 'admin',
        'action' => 'carSave'
    ],
    'admin/car/{id:\d+}/delete' =>[
        'controller' => 'admin',
        'action' => 'carDelete'
    ],

    'admin/promo' =>[
        'controller' => 'admin',
        'action' => 'promo'
    ],
    'admin/promo/add' =>[
        'controller' => 'admin',
        'action' => 'promoAdd'
    ],
    'admin/promo/{id:\d+}/delete' =>[
        'controller' => 'admin',
        'action' => 'promoDelete'
    ],

];
