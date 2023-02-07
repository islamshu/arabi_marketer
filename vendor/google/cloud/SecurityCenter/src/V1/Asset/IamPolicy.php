<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/securitycenter/v1/asset.proto

namespace Google\Cloud\SecurityCenter\V1\Asset;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Cloud IAM Policy information associated with the Google Cloud resource
 * described by the Security Command Center asset. This information is managed
 * and defined by the Google Cloud resource and cannot be modified by the
 * user.
 *
 * Generated from protobuf message <code>google.cloud.securitycenter.v1.Asset.IamPolicy</code>
 */
class IamPolicy extends \Google\Protobuf\Internal\Message
{
    /**
     * The JSON representation of the Policy associated with the asset.
     * See https://cloud.google.com/iam/reference/rest/v1/Policy for format
     * details.
     *
     * Generated from protobuf field <code>string policy_blob = 1;</code>
     */
    private $policy_blob = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $policy_blob
     *           The JSON representation of the Policy associated with the asset.
     *           See https://cloud.google.com/iam/reference/rest/v1/Policy for format
     *           details.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Securitycenter\V1\Asset::initOnce();
        parent::__construct($data);
    }

    /**
     * The JSON representation of the Policy associated with the asset.
     * See https://cloud.google.com/iam/reference/rest/v1/Policy for format
     * details.
     *
     * Generated from protobuf field <code>string policy_blob = 1;</code>
     * @return string
     */
    public function getPolicyBlob()
    {
        return $this->policy_blob;
    }

    /**
     * The JSON representation of the Policy associated with the asset.
     * See https://cloud.google.com/iam/reference/rest/v1/Policy for format
     * details.
     *
     * Generated from protobuf field <code>string policy_blob = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPolicyBlob($var)
    {
        GPBUtil::checkString($var, True);
        $this->policy_blob = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IamPolicy::class, \Google\Cloud\SecurityCenter\V1\Asset_IamPolicy::class);

