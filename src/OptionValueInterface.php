<?php namespace Jiro\Variation;

/**
 * Option value interface.
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

interface OptionValueInterface
{
    /**
     * Get option.
     *
     * @return OptionInterface
     */
    public function option();

    /**
     * Set option.
     *
     * @param OptionInterface $option
     */
    public function setOption(OptionInterface $option = null);

    /**
     * Get internal value.
     *
     * @return string
     */
    public function getValue();

    /**
     * Set internal value.
     *
     * @param string $value
     */
    public function setValue($value);

    /**
     * Proxy method to access the name of real option object.
     * Those methods are mostly useful in templates so you can easily
     * display option name with their values.
     *
     * @return string The name of option
     */
    public function getName();

    /**
     * Proxy method to access the presentation of real option object.
     *
     * @return string The presentation of object
     */
    public function getPresentation();
}