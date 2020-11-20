<?php

declare(strict_types=1);

namespace PoPSchema\CustomPostMutationsWP\LooseContracts;

use PoPSchema\CustomPostMutations\LooseContracts\LooseContractSet;
use PoP\LooseContracts\AbstractLooseContractResolutionSet;

class LooseContractResolutionSet extends AbstractLooseContractResolutionSet
{
    protected function resolveContracts()
    {
        $this->nameResolver->implementNames([
            LooseContractSet::NAME_EDIT_POSTS_CAPABILITY => 'edit_posts',
        ]);
    }
}
