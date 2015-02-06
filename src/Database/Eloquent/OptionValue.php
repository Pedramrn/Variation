<?php namespace Jiro\Variation\Database\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jiro\Variation\OptionValueInterface;

/**
 * Option value.
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

class OptionValue extends Model implements OptionValueInterface
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'option_values';

    /**
     * White list of fillable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'value', 
        'option_id'
    ];

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function option()
    {
        return $this->belongsTo('Jiro\Variation\Database\Eloquent\Option','option_id');
    }

    /**
     * {@inheritdoc}
     */
    public function setOption(OptionInterface $option = null)
    {
        $this->option()->associate($option);    

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        if (null === $this->option) 
        {
            throw new \BadMethodCallException('The option have not been created yet so you cannot access proxy methods.');
        }

        return $this->option->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function getPresentation()
    {
        if (null === $this->option) 
        {
            throw new \BadMethodCallException('The option have not been created yet so you cannot access proxy methods.');
        }

        return $this->option->getPresentation();
    }
}
