<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataproc/v1/autoscaling_policies.proto

namespace Google\Cloud\Dataproc\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Describes an autoscaling policy for Dataproc cluster autoscaler.
 *
 * Generated from protobuf message <code>google.cloud.dataproc.v1.AutoscalingPolicy</code>
 */
class AutoscalingPolicy extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The policy id.
     * The id must contain only letters (a-z, A-Z), numbers (0-9),
     * underscores (_), and hyphens (-). Cannot begin or end with underscore
     * or hyphen. Must consist of between 3 and 50 characters.
     *
     * Generated from protobuf field <code>string id = 1;</code>
     */
    private $id = '';
    /**
     * Output only. The "resource name" of the autoscaling policy, as described
     * in https://cloud.google.com/apis/design/resource_names.
     * * For `projects.regions.autoscalingPolicies`, the resource name of the
     *   policy has the following format:
     *   `projects/{project_id}/regions/{region}/autoscalingPolicies/{policy_id}`
     * * For `projects.locations.autoscalingPolicies`, the resource name of the
     *   policy has the following format:
     *   `projects/{project_id}/locations/{location}/autoscalingPolicies/{policy_id}`
     *
     * Generated from protobuf field <code>string name = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $name = '';
    /**
     * Required. Describes how the autoscaler will operate for primary workers.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.InstanceGroupAutoscalingPolicyConfig worker_config = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $worker_config = null;
    /**
     * Optional. Describes how the autoscaler will operate for secondary workers.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.InstanceGroupAutoscalingPolicyConfig secondary_worker_config = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $secondary_worker_config = null;
    /**
     * Optional. The labels to associate with this autoscaling policy.
     * Label **keys** must contain 1 to 63 characters, and must conform to
     * [RFC 1035](https://www.ietf.org/rfc/rfc1035.txt).
     * Label **values** may be empty, but, if present, must contain 1 to 63
     * characters, and must conform to [RFC
     * 1035](https://www.ietf.org/rfc/rfc1035.txt). No more than 32 labels can be
     * associated with an autoscaling policy.
     *
     * Generated from protobuf field <code>map<string, string> labels = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $labels;
    protected $algorithm;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $id
     *           Required. The policy id.
     *           The id must contain only letters (a-z, A-Z), numbers (0-9),
     *           underscores (_), and hyphens (-). Cannot begin or end with underscore
     *           or hyphen. Must consist of between 3 and 50 characters.
     *     @type string $name
     *           Output only. The "resource name" of the autoscaling policy, as described
     *           in https://cloud.google.com/apis/design/resource_names.
     *           * For `projects.regions.autoscalingPolicies`, the resource name of the
     *             policy has the following format:
     *             `projects/{project_id}/regions/{region}/autoscalingPolicies/{policy_id}`
     *           * For `projects.locations.autoscalingPolicies`, the resource name of the
     *             policy has the following format:
     *             `projects/{project_id}/locations/{location}/autoscalingPolicies/{policy_id}`
     *     @type \Google\Cloud\Dataproc\V1\BasicAutoscalingAlgorithm $basic_algorithm
     *     @type \Google\Cloud\Dataproc\V1\InstanceGroupAutoscalingPolicyConfig $worker_config
     *           Required. Describes how the autoscaler will operate for primary workers.
     *     @type \Google\Cloud\Dataproc\V1\InstanceGroupAutoscalingPolicyConfig $secondary_worker_config
     *           Optional. Describes how the autoscaler will operate for secondary workers.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Optional. The labels to associate with this autoscaling policy.
     *           Label **keys** must contain 1 to 63 characters, and must conform to
     *           [RFC 1035](https://www.ietf.org/rfc/rfc1035.txt).
     *           Label **values** may be empty, but, if present, must contain 1 to 63
     *           characters, and must conform to [RFC
     *           1035](https://www.ietf.org/rfc/rfc1035.txt). No more than 32 labels can be
     *           associated with an autoscaling policy.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dataproc\V1\AutoscalingPolicies::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The policy id.
     * The id must contain only letters (a-z, A-Z), numbers (0-9),
     * underscores (_), and hyphens (-). Cannot begin or end with underscore
     * or hyphen. Must consist of between 3 and 50 characters.
     *
     * Generated from protobuf field <code>string id = 1;</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Required. The policy id.
     * The id must contain only letters (a-z, A-Z), numbers (0-9),
     * underscores (_), and hyphens (-). Cannot begin or end with underscore
     * or hyphen. Must consist of between 3 and 50 characters.
     *
     * Generated from protobuf field <code>string id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * Output only. The "resource name" of the autoscaling policy, as described
     * in https://cloud.google.com/apis/design/resource_names.
     * * For `projects.regions.autoscalingPolicies`, the resource name of the
     *   policy has the following format:
     *   `projects/{project_id}/regions/{region}/autoscalingPolicies/{policy_id}`
     * * For `projects.locations.autoscalingPolicies`, the resource name of the
     *   policy has the following format:
     *   `projects/{project_id}/locations/{location}/autoscalingPolicies/{policy_id}`
     *
     * Generated from protobuf field <code>string name = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. The "resource name" of the autoscaling policy, as described
     * in https://cloud.google.com/apis/design/resource_names.
     * * For `projects.regions.autoscalingPolicies`, the resource name of the
     *   policy has the following format:
     *   `projects/{project_id}/regions/{region}/autoscalingPolicies/{policy_id}`
     * * For `projects.locations.autoscalingPolicies`, the resource name of the
     *   policy has the following format:
     *   `projects/{project_id}/locations/{location}/autoscalingPolicies/{policy_id}`
     *
     * Generated from protobuf field <code>string name = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.BasicAutoscalingAlgorithm basic_algorithm = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Dataproc\V1\BasicAutoscalingAlgorithm|null
     */
    public function getBasicAlgorithm()
    {
        return $this->readOneof(3);
    }

    public function hasBasicAlgorithm()
    {
        return $this->hasOneof(3);
    }

    /**
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.BasicAutoscalingAlgorithm basic_algorithm = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Dataproc\V1\BasicAutoscalingAlgorithm $var
     * @return $this
     */
    public function setBasicAlgorithm($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataproc\V1\BasicAutoscalingAlgorithm::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Required. Describes how the autoscaler will operate for primary workers.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.InstanceGroupAutoscalingPolicyConfig worker_config = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Dataproc\V1\InstanceGroupAutoscalingPolicyConfig|null
     */
    public function getWorkerConfig()
    {
        return $this->worker_config;
    }

    public function hasWorkerConfig()
    {
        return isset($this->worker_config);
    }

    public function clearWorkerConfig()
    {
        unset($this->worker_config);
    }

    /**
     * Required. Describes how the autoscaler will operate for primary workers.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.InstanceGroupAutoscalingPolicyConfig worker_config = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Dataproc\V1\InstanceGroupAutoscalingPolicyConfig $var
     * @return $this
     */
    public function setWorkerConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataproc\V1\InstanceGroupAutoscalingPolicyConfig::class);
        $this->worker_config = $var;

        return $this;
    }

    /**
     * Optional. Describes how the autoscaler will operate for secondary workers.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.InstanceGroupAutoscalingPolicyConfig secondary_worker_config = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\Dataproc\V1\InstanceGroupAutoscalingPolicyConfig|null
     */
    public function getSecondaryWorkerConfig()
    {
        return $this->secondary_worker_config;
    }

    public function hasSecondaryWorkerConfig()
    {
        return isset($this->secondary_worker_config);
    }

    public function clearSecondaryWorkerConfig()
    {
        unset($this->secondary_worker_config);
    }

    /**
     * Optional. Describes how the autoscaler will operate for secondary workers.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.InstanceGroupAutoscalingPolicyConfig secondary_worker_config = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\Dataproc\V1\InstanceGroupAutoscalingPolicyConfig $var
     * @return $this
     */
    public function setSecondaryWorkerConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataproc\V1\InstanceGroupAutoscalingPolicyConfig::class);
        $this->secondary_worker_config = $var;

        return $this;
    }

    /**
     * Optional. The labels to associate with this autoscaling policy.
     * Label **keys** must contain 1 to 63 characters, and must conform to
     * [RFC 1035](https://www.ietf.org/rfc/rfc1035.txt).
     * Label **values** may be empty, but, if present, must contain 1 to 63
     * characters, and must conform to [RFC
     * 1035](https://www.ietf.org/rfc/rfc1035.txt). No more than 32 labels can be
     * associated with an autoscaling policy.
     *
     * Generated from protobuf field <code>map<string, string> labels = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Optional. The labels to associate with this autoscaling policy.
     * Label **keys** must contain 1 to 63 characters, and must conform to
     * [RFC 1035](https://www.ietf.org/rfc/rfc1035.txt).
     * Label **values** may be empty, but, if present, must contain 1 to 63
     * characters, and must conform to [RFC
     * 1035](https://www.ietf.org/rfc/rfc1035.txt). No more than 32 labels can be
     * associated with an autoscaling policy.
     *
     * Generated from protobuf field <code>map<string, string> labels = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->whichOneof("algorithm");
    }

}

