<?php
declare(strict_types = 1);

namespace TechDivision\NodeTypes\FlexColumnLayouts;

use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;


/*
* This file is part of the TechDivision.NodeTypes.FlexColumnLayouts package.
*
* TechDivision - neos@techdivision.com
*
* This package is Open Source Software. For the full copyright and license
* information, please view the LICENSE file which was distributed with this
* source code.
*/

class CssClassMappingHelper implements ProtectedContextAwareInterface
{
    /**
     * @var array
     * @Flow\InjectConfiguration("cssClassMapping")
     */
    protected $cssClassMapping;

    /**
     * replaces class values from class string with according css classes from
     * other frameworks
     * @param string $concatenatedCssClasses
     * @param string $configurationKey
     * @return string
     */
    public function replace($concatenatedCssClasses, $configurationKey): string
    {
        if (array_key_exists($configurationKey, $this->cssClassMapping) === false) {
            return $concatenatedCssClasses;
        }

        $cssClasses = explode(' ', $concatenatedCssClasses);
        $replacements = $this->cssClassMapping[$configurationKey];
        $replacedCssClasses = [];

        foreach ($cssClasses as $cssClass) {
            if (trim($cssClass) === ''){
                continue;
            }
            if (array_key_exists($cssClass, $replacements)) {
                $replacedCssClasses[] = $replacements[$cssClass];
                continue;
            }
            // in any other case, just keep the current class as there is no replacement
            $replacedCssClasses[] = $cssClass;
        }

        return implode(' ', $replacedCssClasses);
    }

    /**
     * @param string $methodName
     *
     * @return boolean
     */
    public function allowsCallOfMethod($methodName): bool
    {
        return true;
    }

}