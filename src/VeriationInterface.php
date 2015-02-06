<?php namespace Jiro\Variation;

/**
 * Object Variation interface.
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

interface VariationInterface
{
    /**
     * Checks whether variant is master.
     *
     * @return Boolean
     */
    public function isMaster();

    /**
     * Defines whether variant is master.
     *
     * @param Boolean $master
     */
    public function setMaster($master);

    /**
     * Get presentation.
     *
     * This should be generated from option values
     * when no other is set.
     *
     * @return string
     */
    public function getPresentation();

    /**
     * Set custom presentation.
     *
     * @param string $presentation
     */
    public function setPresentation($presentation);

    /**
     * Get subject model.
     *
     * @return VariableInterface
     */
    public function subject();

    /**
     * Set subject mmodel.
     *
     * @param VariableInterface|null $subject
     */
    public function setSubject(VariableInterface $subject = null);

    /**
     * Returns all option values.
     *
     * @return Collection|OptionValueInterface[]
     */
    public function options();

    /**
     * Sets all variant options.
     *
     * @param Collection $options
     */
    public function setOptions($options);

    /**
     * Adds option value.
     *
     * @param OptionValueInterface $option
     */
    public function addOption($option);

    /**
     * Removes option from variant.
     *
     * @param OptionValueInterface $option
     */
    public function removeOption($option);

    /**
     * Checks whether variant has given option.
     *
     * @param OptionValueInterface $option
     *
     * @return Boolean
     */
    public function hasOption($option);

    /**
     * This method is used by product variants to inherit values
     * from a master variant, which is treated as a "template" for them.
     *
     * This is usable only when product has options.
     *
     * @param VariantInterface $masterVariant
     */
    public function setDefaults($masterVariant);
}
