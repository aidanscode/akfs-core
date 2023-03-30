<?php

namespace Carnival\Language\Contracts;

interface Language {
    function getName() : string;
    function getVersion() : string;
    function getLanguageFilePath() : string;
}
