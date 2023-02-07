<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/retail/v2/control_service.proto

namespace Google\Cloud\Retail\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request for CreateControl method.
 *
 * Generated from protobuf message <code>google.cloud.retail.v2.CreateControlRequest</code>
 */
class CreateControlRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Full resource name of parent catalog. Format:
     * `projects/{project_number}/locations/{location_id}/catalogs/{catalog_id}`
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. The Control to create.
     *
     * Generated from protobuf field <code>.google.cloud.retail.v2.Control control = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $control = null;
    /**
     * Required. The ID to use for the Control, which will become the final
     * component of the Control's resource name.
     * This value should be 4-63 characters, and valid characters
     * are /[a-z][0-9]-_/.
     *
     * Generated from protobuf field <code>string control_id = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $control_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. Full resource name of parent catalog. Format:
     *           `projects/{project_number}/locations/{location_id}/catalogs/{catalog_id}`
     *     @type \Google\Cloud\Retail\V2\Control $control
     *           Required. The Control to create.
     *     @type string $control_id
     *           Required. The ID to use for the Control, which will become the final
     *           component of the Control's resource name.
     *           This value should be 4-63 characters, and valid characters
     *           are /[a-z][0-9]-_/.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Retail\V2\ControlService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Full resource name of parent catalog. Format:
     * `projects/{project_number}/locations/{location_id}/catalogs/{catalog_id}`
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. Full resource name of parent catalog. Format:
     * `projects/{project_number}/locations/{location_id}/catalogs/{catalog_id}`
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Required. The Control to create.
     *
     * Generated from protobuf field <code>.google.cloud.retail.v2.Control control = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Retail\V2\Control|null
     */
    public function getControl()
    {
        return $this->control;
    }

    public function hasControl()
    {
        return isset($this->control);
    }

    public function clearControl()
    {
        unset($this->control);
    }

    /**
     * Required. The Control to create.
     *
     * Generated from protobuf field <code>.google.cloud.retail.v2.Control control = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Retail\V2\Control $var
     * @return $this
     */
    public function setControl($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Retail\V2\Control::class);
        $this->control = $var;

        return $this;
    }

    /**
     * Required. The ID to use for the Control, which will become the final
     * component of the Control's resource name.
     * This value should be 4-63 characters, and valid characters
     * are /[a-z][0-9]-_/.
     *
     * Generated from protobuf field <code>string control_id = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getControlId()
    {
        return $this->control_id;
    }

    /**
     * Required. The ID to use for the Control, which will become the final
     * component of the Control's resource name.
     * This value should be 4-63 characters, and valid characters
     * are /[a-z][0-9]-_/.
     *
     * Generated from protobuf field <code>string control_id = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setControlId($var)
    {
        GPBUtil::checkString($var, True);
        $this->control_id = $var;

        return $this;
    }

}

