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

class EventTypeEnum
{
    const ADD_ACTION = 'add_action';
    const HAS_ACTION = 'has_action';
    const REMOVE_ACTION = 'remove_action';
    const DO_ACTION = 'do_action';
    const ADD_FILTER = 'add_filter';
    const HAS_FILTER = 'has_filter';
    const REMOVE_FILTER = 'remove_filter';
    const APPLY_FILTER = 'apply_filter';

    const SUPPORTS = array(
        self::ADD_ACTION,
        self::HAS_ACTION,
        self::REMOVE_ACTION,
        self::DO_ACTION,
        self::ADD_FILTER,
        self::HAS_FILTER,
        self::REMOVE_FILTER,
        self::APPLY_FILTER,
    );

    /**
     * @param string $type
     *
     * @return bool
     */
    public static function support($type)
    {
        return in_array($type, self::SUPPORTS);
    }
}
