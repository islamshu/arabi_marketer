<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/vmwareengine/v1/vmwareengine.proto

namespace Google\Cloud\VmwareEngine\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A cluster in a private cloud.
 *
 * Generated from protobuf message <code>google.cloud.vmwareengine.v1.Cluster</code>
 */
class Cluster extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of this cluster.
     * Resource names are schemeless URIs that follow the conventions in
     * https://cloud.google.com/apis/design/resource_names.
     * For example:
     * `projects/my-project/locations/us-central1-a/privateClouds/my-cloud/clusters/my-cluster`
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $name = '';
    /**
     * Output only. Creation time of this resource.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. Last update time of this resource.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * Output only. State of the resource.
     *
     * Generated from protobuf field <code>.google.cloud.vmwareengine.v1.Cluster.State state = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Output only. True if the cluster is a management cluster; false otherwise.
     * There can only be one management cluster in a private cloud
     * and it has to be the first one.
     *
     * Generated from protobuf field <code>bool management = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $management = false;
    /**
     * Output only. System-generated unique identifier for the resource.
     *
     * Generated from protobuf field <code>string uid = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $uid = '';
    /**
     * Required. The map of cluster node types in this cluster, where the key is
     * canonical identifier of the node type (corresponds to the `NodeType`).
     *
     * Generated from protobuf field <code>map<string, .google.cloud.vmwareengine.v1.NodeTypeConfig> node_type_configs = 16 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $node_type_configs;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Output only. The resource name of this cluster.
     *           Resource names are schemeless URIs that follow the conventions in
     *           https://cloud.google.com/apis/design/resource_names.
     *           For example:
     *           `projects/my-project/locations/us-central1-a/privateClouds/my-cloud/clusters/my-cluster`
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. Creation time of this resource.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. Last update time of this resource.
     *     @type int $state
     *           Output only. State of the resource.
     *     @type bool $management
     *           Output only. True if the cluster is a management cluster; false otherwise.
     *           There can only be one management cluster in a private cloud
     *           and it has to be the first one.
     *     @type string $uid
     *           Output only. System-generated unique identifier for the resource.
     *     @type array|\Google\Protobuf\Internal\MapField $node_type_configs
     *           Required. The map of cluster node types in this cluster, where the key is
     *           canonical identifier of the node type (corresponds to the `NodeType`).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Vmwareengine\V1\Vmwareengine::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of this cluster.
     * Resource names are schemeless URIs that follow the conventions in
     * https://cloud.google.com/apis/design/resource_names.
     * For example:
     * `projects/my-project/locations/us-central1-a/privateClouds/my-cloud/clusters/my-cluster`
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. The resource name of this cluster.
     * Resource names are schemeless URIs that follow the conventions in
     * https://cloud.google.com/apis/design/resource_names.
     * For example:
     * `projects/my-project/locations/us-central1-a/privateClouds/my-cloud/clusters/my-cluster`
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Output only. Creation time of this resource.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Output only. Creation time of this resource.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. Last update time of this resource.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * Output only. Last update time of this resource.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * Output only. State of the resource.
     *
     * Generated from protobuf field <code>.google.cloud.vmwareengine.v1.Cluster.State state = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. State of the resource.
     *
     * Generated from protobuf field <code>.google.cloud.vmwareengine.v1.Cluster.State state = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\VmwareEngine\V1\Cluster\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. True if the cluster is a management cluster; false otherwise.
     * There can only be one management cluster in a private cloud
     * and it has to be the first one.
     *
     * Generated from protobuf field <code>bool management = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return bool
     */
    public function getManagement()
    {
        return $this->management;
    }

    /**
     * Output only. True if the cluster is a management cluster; false otherwise.
     * There can only be one management cluster in a private cloud
     * and it has to be the first one.
     *
     * Generated from protobuf field <code>bool management = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param bool $var
     * @return $this
     */
    public function setManagement($var)
    {
        GPBUtil::checkBool($var);
        $this->management = $var;

        return $this;
    }

    /**
     * Output only. System-generated unique identifier for the resource.
     *
     * Generated from protobuf field <code>string uid = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Output only. System-generated unique identifier for the resource.
     *
     * Generated from protobuf field <code>string uid = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setUid($var)
    {
        GPBUtil::checkString($var, True);
        $this->uid = $var;

        return $this;
    }

    /**
     * Required. The map of cluster node types in this cluster, where the key is
     * canonical identifier of the node type (corresponds to the `NodeType`).
     *
     * Generated from protobuf field <code>map<string, .google.cloud.vmwareengine.v1.NodeTypeConfig> node_type_configs = 16 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getNodeTypeConfigs()
    {
        return $this->node_type_configs;
    }

    /**
     * Required. The map of cluster node types in this cluster, where the key is
     * canonical identifier of the node type (corresponds to the `NodeType`).
     *
     * Generated from protobuf field <code>map<string, .google.cloud.vmwareengine.v1.NodeTypeConfig> node_type_configs = 16 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setNodeTypeConfigs($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\VmwareEngine\V1\NodeTypeConfig::class);
        $this->node_type_configs = $arr;

        return $this;
    }

}

