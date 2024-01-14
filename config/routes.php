<?php

use mvc\Router;

Router::addRoute('^$', ['controller' => 'App', 'action' => 'index']);
Router::addRoute('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');