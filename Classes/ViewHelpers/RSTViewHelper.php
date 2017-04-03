<?php
namespace CM\Flow\RST\ViewHelpers;

use CM\Flow\RST\Service\RSTService;
use Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper;
use Neos\Flow\Annotations as Flow;

class RSTViewHelper extends AbstractViewHelper {
    /**
     * @var RSTService
     * @Flow\Inject
     */
    protected $rstService;

    /**
     * @param string $rst
     * @return string
     */
    public function render($rst = null) {
        if($rst == null) {
            $rst = $this->renderChildren();
        }

        return $this->rstService->parse($rst);
    }
}