<?php

namespace Carnival\Themes;

interface Theme {
    function getName() : string;

    function getDescription() : string;

    function getAuthor() : string;

    function getViewsDirectory() : string; 

    function getVersion() : string;
}