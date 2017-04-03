<?php
namespace Axovis\Flow\RST\Service;

use Gregwar\RST\Builder;
use Gregwar\RST\Parser;
use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Scope("singleton")
 */
class RSTService {
    /**
     * @var Parser
     */
    protected $parser;

    /**
     * @var Builder
     */
    protected $builder;

    public function __construct() {
        $this->parser = new Parser();
        $this->builder = new Builder();
    }

    /**
     * This will parse the rst $content and return it as html.
     *
     * @param string $content some rst content
     * @return string the created html content
     */
    public function parse($content) {
        $this->parser->getEnvironment()->getErrorManager()->abortOnError(false);
        $this->parser->getEnvironment()->getErrorManager()->setOutputErrorMessage(false);

        $document = $this->parser->parse($content);

        return $document->render();
    }

    /**
     * This will parse a whole tree of documents and generate an output directory containing files.
     *
     * It will parse all the files in the $inputDirectory, starting with index.rst, scan it for
     * dependency references and generate html files in $outputDirectory.
     */
    public function build($inputDirectory,$outputDirectory) {
        $this->builder->build($inputDirectory, $outputDirectory);
    }
}