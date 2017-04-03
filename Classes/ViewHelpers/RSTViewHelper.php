<?php
namespace Axovis\Flow\RST\ViewHelpers;

use Axovis\Flow\RST\Service\RSTService;
use TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\Flow\Annotations as Flow;

class RSTViewHelper extends AbstractViewHelper {
    /**
     * @var RSTService
     * @Flow\Inject
     */
    protected $rstService;

    /**
     * @param string $rst
     * @return array
     */
    public function render($rst = null) {
        if($rst == null) {
            $rst = $this->renderChildren();
        }

        return $this->rstService->parse($rst);
    }
}