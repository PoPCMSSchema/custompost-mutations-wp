<?php

declare(strict_types=1);

namespace PoPSchema\CustomPostMutationsWP\TypeAPIs;

use PoPSchema\CustomPostMutations\TypeAPIs\CustomPostTypeAPIInterface;

/**
 * Methods to interact with the Type, to be implemented by the underlying CMS
 */
class CustomPostTypeAPI implements CustomPostTypeAPIInterface
{
    /**
     * @param array<string, mixed> $data
     * @return mixed the ID of the created custom post
     */
    public function createCustomPost(array $data)
    {
        return null;
    }
}
