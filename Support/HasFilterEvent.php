<?php


/**
 * This file is part of the typenter package.
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @author libertyspy <admin@kernelstudio.com>
 */

namespace Typenter\Component\Event\Support;

use Typenter\Component\Event\EventTypeEnum;

class HasFilterEvent extends WordpressEvent
{
    public function getType()
    {
        return EventTypeEnum::HAS_FILTER;
    }
}
