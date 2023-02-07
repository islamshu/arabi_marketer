<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/gkemulticloud/v1/aws_service.proto

namespace Google\Cloud\GkeMultiCloud\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for `AwsClusters.ListAwsClusters` method.
 *
 * Generated from protobuf message <code>google.cloud.gkemulticloud.v1.ListAwsClustersResponse</code>
 */
class ListAwsClustersResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * A list of [AwsCluster][google.cloud.gkemulticloud.v1.AwsCluster] resources
     * in the specified GCP project and region region.
     *
     * Generated from protobuf field <code>repeated .google.cloud.gkemulticloud.v1.AwsCluster aws_clusters = 1;</code>
     */
    private $aws_clusters;
    /**
     * Token to retrieve the next page of results, or empty if there are no more
     * results in the list.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    private $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Cloud\GkeMultiCloud\V1\AwsCluster>|\Google\Protobuf\Internal\RepeatedField $aws_clusters
     *           A list of [AwsCluster][google.cloud.gkemulticloud.v1.AwsCluster] resources
     *           in the specified GCP project and region region.
     *     @type string $next_page_token
     *           Token to retrieve the next page of results, or empty if there are no more
     *           results in the list.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Gkemulticloud\V1\AwsService::initOnce();
        parent::__construct($data);
    }

    /**
     * A list of [AwsCluster][google.cloud.gkemulticloud.v1.AwsCluster] resources
     * in the specified GCP project and region region.
     *
     * Generated from protobuf field <code>repeated .google.cloud.gkemulticloud.v1.AwsCluster aws_clusters = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAwsClusters()
    {
        return $this->aws_clusters;
    }

    /**
     * A list of [AwsCluster][google.cloud.gkemulticloud.v1.AwsCluster] resources
     * in the specified GCP project and region region.
     *
     * Generated from protobuf field <code>repeated .google.cloud.gkemulticloud.v1.AwsCluster aws_clusters = 1;</code>
     * @param array<\Google\Cloud\GkeMultiCloud\V1\AwsCluster>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAwsClusters($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\GkeMultiCloud\V1\AwsCluster::class);
        $this->aws_clusters = $arr;

        return $this;
    }

    /**
     * Token to retrieve the next page of results, or empty if there are no more
     * results in the list.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * Token to retrieve the next page of results, or empty if there are no more
     * results in the list.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}
