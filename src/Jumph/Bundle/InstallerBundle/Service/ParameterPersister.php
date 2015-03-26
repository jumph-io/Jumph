<?php

/**
 * This file is part of the Jumph package.
 *
 * (c) Peter Nijssen
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jumph\Bundle\InstallerBundle\Service;

use RuntimeException;
use Symfony\Component\Yaml\Yaml;

class ParameterPersister
{
    /**
     * @var string
     */
    protected $parameterFile;

    /**
     * @param string $parameterFile
     */
    public function __construct($parameterFile)
    {
        $this->parameterFile = $parameterFile;
    }

    /**
     * Dump the parameters
     *
     * @param array $data
     */
    public function dumpParameters(array $data)
    {
        $parameters = $this->getCurrentParameters();
        $parameters = array_merge($parameters, $data);

        if (false === file_put_contents($this->parameterFile, Yaml::dump(array('parameters' => $parameters)))) {
            throw new RuntimeException(sprintf('Failed to write to %s.', $this->parameterFile));
        }
    }

    /**
     * Retrieve the current parameters
     *
     * @return array
     */
    public function getCurrentParameters()
    {
        $data = Yaml::parse($this->parameterFile);
        $parameters = array();
        foreach ($data['parameters'] as $key => $value) {
            $parameters[$key] = $value;
        }
        return $parameters;
    }
}
