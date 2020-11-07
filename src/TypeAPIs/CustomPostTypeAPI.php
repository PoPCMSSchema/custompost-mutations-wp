<?php

declare(strict_types=1);

namespace PoPSchema\CustomPostMutationsWP\TypeAPIs;

use PoPSchema\CustomPostMutations\TypeAPIs\CustomPostTypeAPIInterface;
use PoPSchema\CustomPostsWP\TypeAPIs\CustomPostTypeAPIUtils;

/**
 * Methods to interact with the Type, to be implemented by the underlying CMS
 */
class CustomPostTypeAPI implements CustomPostTypeAPIInterface
{
    protected function convertQueryArgsFromPoPToCMSForInsertUpdatePost(array &$query): void
    {
        // Convert the parameters
        if (isset($query['custom-post-status'])) {
            $query['post_status'] = CustomPostTypeAPIUtils::convertPostStatusFromPoPToCMS($query['custom-post-status']);
            unset($query['custom-post-status']);
        }
        if (isset($query['id'])) {
            $query['ID'] = $query['id'];
            unset($query['id']);
        }
        if (isset($query['post-content'])) {
            $query['post_content'] = $query['post-content'];
            unset($query['post-content']);
        }
        if (isset($query['post-title'])) {
            $query['post_title'] = $query['post-title'];
            unset($query['post-title']);
        }
        if (isset($query['custom-post-type'])) {
            $query['post_type'] = $query['custom-post-type'];
            unset($query['custom-post-type']);
        }
    }
    /**
     * @param array<string, mixed> $data
     * @return mixed the ID of the created custom post
     */
    public function createCustomPost(array $data)
    {
        // Convert the parameters
        $this->convertQueryArgsFromPoPToCMSForInsertUpdatePost($data);
        return \wp_insert_post($data);
    }
    /**
     * @param array<string, mixed> $data
     * @return mixed the ID of the updated custom post
     */
    public function updateCustomPost(array $data)
    {
        // Convert the parameters
        $this->convertQueryArgsFromPoPToCMSForInsertUpdatePost($data);
        return \wp_update_post($data);
    }
}
