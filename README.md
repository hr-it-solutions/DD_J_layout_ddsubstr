[![DDSTATE](https://img.shields.io/badge/status-ALPHA-red.svg?style=flat)](https://img.shields.io/badge/status-ALPHA-red.svg?style=flat)

# DD_J_layout_ddsubstr
A Joomla! substr layout for multiple string cut after (x) chracters (Responsive Prepareing)

[![GPL Licence](https://badges.frapsoft.com/os/gpl/gpl.png?v=102)](https://opensource.org/licenses/GPL-2.0/)

### Features
- mb_substr (multiple string cut after (x) chracters (Responsive Prepareing))
- UTF-8
- SafeHTML
- Keep Words anyway!
- 2 or 3 Parts with classes hiddenstring-m and/or hiddenstring-x


### Using
To place at html/layouts/dd_layouts/ddsubstr.php


    $str = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.';

    echo JLayoutHelper::render('dd_layouts.ddsubstr', array('String' => $str, 'X_length' => 90, 'M_length' => 60, 'S_length' => 30));


# output

    Lorem ipsum dolor sit amet, <span class="hiddenstring-m">consectetuer adipiscing elit. <span class="hiddenstring-x">Aenean commodo ligula eget</span></span>...


# System requirements
Joomla 3.8 +                                                                                <br>
PHP 7 or newer is recommended.

# DD_ Namespace
DD_ stands for  **D**idl**d**u e.K. | HR IT-Solutions (Brand recognition)                   <br>
It is a namespace prefix, provided to avoid element name conflicts.

<br>
Author: HR IT-Solutions Florian Häusler https://www.hr-it-solution.com                      <br>
Copyright: (C) 2017 - 2017 Didldu e.K. | HR IT-Solutions                                    <br>
http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only