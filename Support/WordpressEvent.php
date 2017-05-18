<?php


/**
 * This file is part of the kernelstudio package.
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @author libertyspy < service@kernelstudio.com >
 *
 * @see http://www.kernelstudio.com
 */

namespace Typenter\Component\Event\Support;

use Typenter\Component\Event\EventTypeEnum;

class WordpressEvent extends Event
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $target;

    /**
     * @var mixed
     */
    protected $arguments;

    /**
     * @var int
     */
    protected $priority;

    /**
     * @var callable
     */
    protected $callback = null;
    
    /**
     * @var mixed
     */
    protected $result = null;

    /**
     * @param array  $arguments
     * @param number $priority
     */
    public function __construct($arguments = null, $priority = 10)
    {
        $this->arguments = $arguments;
        $this->priority = (int) $priority;
    }

    /**
     * @return bool
     */
    public function support()
    {
        return EventTypeEnum::support($this->getType());
    }

    /**
     * @return string $target
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @return mixed $arguments
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @return int $priority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return callable $callback
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $target
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @param mixed $arguments
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * @param number $priority
     */
    public function setPriority($priority = 10)
    {
        $this->priority = (int) $priority;

        return $this;
    }

    /**
     * @param callable $callback
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;

        return $this;
    }
    
    /**
     * @return the $result
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
        
        return $this;
    }

}
