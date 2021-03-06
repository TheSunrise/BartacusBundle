<?php

declare(strict_types=1);

/*
 * This file is part of the Bartacus project, which integrates Symfony into TYPO3.
 *
 * Copyright (c) 2016-2017 Patrik Karisch
 *
 * The BartacusBundle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * The BartacusBundle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with the BartacusBundle. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Bartacus\Bundle\BartacusBundle\EventListener;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Initializes the cObj on the TSFE, when not done yet.
 */
class ContentObjectListener
{
    /**
     * @var TypoScriptFrontendController
     */
    private $frontendController;

    public function __construct(TypoScriptFrontendController $frontendController)
    {
        $this->frontendController = $frontendController;
    }

    public function onKernelRequest(): void
    {
        if (!$this->frontendController->cObj instanceof ContentObjectRenderer) {
            $this->frontendController->newCObj();
        }
    }
}
