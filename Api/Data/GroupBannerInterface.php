<?php

declare(strict_types=1);

namespace Tam\BannerSlider\Api\Data;

/**

 * Represents a store and properties

 *

 * @api

 */

interface GroupBannerInterface

{

    /**

     * Constants for keys of data array. Identical to the name of the getter in snake case

     */

    const NAME = 'name';

    /**#@-*/

    public function getName(): ?string;

    public function setName(?string $name): void;

}
