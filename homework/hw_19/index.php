<?php

use homework\hw_19\factories\LGFactory;
use homework\hw_19\factories\SonyFactory;

\homework\hw_19\Controller::makeTV(new SonyFactory());
echo '<hr>';
\homework\hw_19\Controller::makeTV(new SonyFactory(), 'led');
echo '<hr>';
\homework\hw_19\Controller::makeTV(new LGFactory());
echo '<hr>';
\homework\hw_19\Controller::makeTV(new LGFactory(), 'led');
