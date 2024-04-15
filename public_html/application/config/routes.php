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
    ]


];
