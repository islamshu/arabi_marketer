<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/vmwareengine/v1/vmwareengine.proto

namespace Google\Cloud\VmwareEngine\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [VmwareEngine.UpdatePrivateCloud][google.cloud.vmwareengine.v1.VmwareEngine.UpdatePrivateCloud]
 *
 * Generated from protobuf message <code>google.cloud.vmwareengine.v1.UpdatePrivateCloudRequest</code>
 */
class UpdatePrivateCloudRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Private cloud description.
     *
     * Generated from protobuf field <code>.google.cloud.vmwareengine.v1.PrivateCloud private_cloud = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $private_cloud = null;
    /**
     * Required. Field mask is used to specify the fields to be overwritten in the
     * `PrivateCloud` resource by the update. The fields specified in `updateMask`
     * are relative to the resource, not the full request. A field will be
     * overwritten if it is in the mask. If the user does not provide a mask then
     * all fields will be overwritten.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $update_mask = null;
    /**
     * Optional. The request ID must be a valid UUID with the exception that zero
     * UUID is not supported (00000000-0000-0000-0000-000000000000).
     *
     * Generated from protobuf field <code>string request_id = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $request_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\VmwareEngine\V1\PrivateCloud $private_cloud
     *           Required. Private cloud description.
     *     @type \Google\Protobuf\FieldMask $update_mask
     *           Required. Field mask is used to specify the fields to be overwritten in the
     *           `PrivateCloud` resource by the update. The fields specified in `updateMask`
     *           are relative to the resource, not the full request. A field will be
     *           overwritten if it is in the mask. If the user does not provide a mask then
     *           all fields will be overwritten.
     *     @type string $request_id
     *           Optional. The request ID must be a valid UUID with the exception that zero
     *           UUID is not supported (00000000-0000-0000-0000-000000000000).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Vmwareengine\V1\Vmwareengine::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Private cloud description.
     *
     * Generated from protobuf field <code>.google.cloud.vmwareengine.v1.PrivateCloud private_cloud = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\VmwareEngine\V1\PrivateCloud|null
     */
    public function getPrivateCloud()
    {
        return $this->private_cloud;
    }

    public function hasPrivateCloud()
    {
        return isset($this->private_cloud);
    }

    public function clearPrivateCloud()
    {
        unset($this->private_cloud);
    }

    /**
     * Required. Private cloud description.
     *
     * Generated from protobuf field <code>.google.cloud.vmwareengine.v1.PrivateCloud private_cloud = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\VmwareEngine\V1\PrivateCloud $var
     * @return $this
     */
    public function setPrivateCloud($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\VmwareEngine\V1\PrivateCloud::class);
        $this->private_cloud = $var;

        return $this;
    }

    /**
     * Required. Field mask is used to specify the fields to be overwritten in the
     * `PrivateCloud` resource by the update. The fields specified in `updateMask`
     * are relative to the resource, not the full request. A field will be
     * overwritten if it is in the mask. If the user does not provide a mask then
     * all fields will be overwritten.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\FieldMask|null
     */
    public function getUpdateMask()
    {
        return $this->update_mask;
    }

    public function hasUpdateMask()
    {
        return isset($this->update_mask);
    }

    public function clearUpdateMask()
    {
        unset($this->update_mask);
    }

    /**
     * Required. Field mask is used to specify the fields to be overwritten in the
     * `PrivateCloud` resource by the update. The fields specified in `updateMask`
     * are relative to the resource, not the full request. A field will be
     * overwritten if it is in the mask. If the user does not provide a mask then
     * all fields will be overwritten.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setUpdateMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->update_mask = $var;

        return $this;
    }

    /**
     * Optional. The request ID must be a valid UUID with the exception that zero
     * UUID is not supported (00000000-0000-0000-0000-000000000000).
     *
     * Generated from protobuf field <code>string request_id = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getRequestId()
    {
        return $this->request_id;
    }

    /**
     * Optional. The request ID must be a valid UUID with the exception that zero
     * UUID is not supported (00000000-0000-0000-0000-000000000000).
     *
     * Generated from protobuf field <code>string request_id = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setRequestId($var)
    {
        GPBUtil::checkString($var, True);
        $this->request_id = $var;

        return $this;
    }

}
