<?php


return [
    'login' => [
        'controller' => 'main',
        'action' => 'login'
    ],
    'profile' => [
        'controller' => 'main',
        'action' => 'profile'
    ],
    'registration' => [
        'controller' => 'main',
        'action' => 'registration'
    ],
    'authorize' => [
        'controller' => 'main',
        'action' => 'authorize'
    ],
    'create-user' => [
        'controller' => 'main',
        'action' => 'createUser'
    ],
    'logout' => [
        'controller' => 'main',
        'action' => 'logout'
    ],



    '' => [
      'controller' => 'main',
      'action' => 'index'
    ],
    'filter' => [
        'controller' => 'main',
        'action' => 'filter'
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
    'cart/{id:\d+}/delete' => [
        'controller' => 'cart',
        'action' => 'delete'
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

    'admin/promo' => [
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
    'admin/addpost' => [
        'controller' => 'admin',
        'action' => 'addpost',
    ],
    'admin/posts' => [
        'controller' => 'admin',
        'action' => 'posts',
    ],
    'admin/post/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'post',
    ],
    'admin/post/{id:\d+}/delete' => [
        'controller' => 'admin',
        'action' => 'postDelete',
    ],
    'admin/post/{id:\d+}/save' => [
        'controller' => 'admin',
        'action' => 'postSave'
    ],
    'car/createreview' => [
        'controller' => 'main',
        'action' => 'createreview'
    ],
    'post/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post'
    ],
];
