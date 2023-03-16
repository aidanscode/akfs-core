<?php

namespace Carnival\Themes;

interface Theme {
    
    function getName() : string;

    function getDescription() : string;

    function getLogo() : string;

    function getAuthor() : string;

    function getViewsDirectory() : string; 
}