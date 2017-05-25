<?php


/**
 * This file is part of the typenter package.
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @author libertyspy <admin@kernelstudio.com>
 */

namespace Typenter\Component\Event;

use Symfony\Component\EventDispatcher\EventDispatcher as SymfonyEventDispatcher;
use Symfony\Component\EventDispatcher\Event;
use Typenter\Component\Event\Support\WordpressEvent;

class EventDispatcher extends SymfonyEventDispatcher
{
    /**
     * {@inheritdoc}
     */
    public function dispatch($eventName, Event $event = null)
    {
        if ($event instanceof WordpressEvent) {
            $event->setTarget($eventName);

            return $this->trigger($event);
        } else {
            return parent::dispatch($eventName, $event);
        }
    }

    /**
     * @param WordpressEvent $event
     *
     * @return mixed
     */
    public function trigger(WordpressEvent $event)
    {
        /** @var $event \\Typenter\Component\Event\Support\WordpressEvent */
        $event = parent::dispatch($event->getTarget(), $event);

        if (!$event->support()) {
            return $event;
        }
        $result = null;

        switch ($event->getType()) {
            case EventTypeEnum::ADD_ACTION:
                $result = add_action($event->getTarget(), $event->getCallback(), $event->getPriority(), $event->getArguments());
                break;
            case EventTypeEnum::HAS_ACTION:
                $result = has_action($event->getTarget(), $event->getCallback());
                break;
            case EventTypeEnum::REMOVE_ACTION:
                $result = remove_action($event->getTarget(), $event->getCallback(), $event->getPriority());
                break;
            case EventTypeEnum::DO_ACTION:
                $result = do_action($event->getTarget(), $event->getArguments());
                break;
            case EventTypeEnum::ADD_FILTER:
                $result = add_filter($event->getTarget(), $event->getCallback(), $event->getPriority(), $event->getArguments());
                break;
            case EventTypeEnum::HAS_FILTER:
                $result = has_filter($event->getTarget(), $event->getCallback());
                break;
            case EventTypeEnum::REMOVE_FILTER:
                $result = remove_filter($event->getTarget(), $event->getCallback(), $event->getPriority());
                break;
            case EventTypeEnum::APPLY_FILTER:
                $result = apply_filters($event->getTarget(), $event->getArguments());
                break;
        }

        $event->setResult($result);

        return $event;
    }
}
