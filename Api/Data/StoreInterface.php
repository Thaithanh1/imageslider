<?php

declare(strict_types=1);

namespace Tam\BannerSlider\Api\Data;

/**

 * Represents a store and properties

 *

 * @api

 */

interface StoreInterface

{

    /**

     * Constants for keys of data array. Identical to the name of the getter in snake case

     */

    const NAME = 'name';

    const URL = 'url';

    const IMAGE = 'image';

    const STATUS = 'status';

    const STORE_ID = 'store_id';

    const ORDER = 'order';

    const GROUP_ID = 'group_id';

    const DESCRIPTION = 'description';

    const NAME_GROUP = 'name';

    /**#@-*/

    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getURL(): ?string;

    public function setURL(?string $url): void;

    public function getImage(): ?string;

    public function setImage(?string $image): void;

    public function getStatus(): ?int;

    public function setStatus(?int $status): void;

    public function getStore_id(): ?int;

    public function setStore_id(?int $store_id): void;

    public function getOrder(): ?int;

    public function setOrder(?int $order): void;

    public function getGroup_id(): ?int;

    public function setGroup_id(?int $group_id): void;

    public function getDescription(): ?string;

    public function setDescription(?string $description): void;

}
