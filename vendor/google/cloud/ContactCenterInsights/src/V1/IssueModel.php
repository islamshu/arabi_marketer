<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/contactcenterinsights/v1/resources.proto

namespace Google\Cloud\ContactCenterInsights\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The issue model resource.
 *
 * Generated from protobuf message <code>google.cloud.contactcenterinsights.v1.IssueModel</code>
 */
class IssueModel extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The resource name of the issue model.
     * Format:
     * projects/{project}/locations/{location}/issueModels/{issue_model}
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $name = '';
    /**
     * The representative name for the issue model.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     */
    private $display_name = '';
    /**
     * Output only. The time at which this issue model was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. The most recent time at which the issue model was updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * Output only. State of the model.
     *
     * Generated from protobuf field <code>.google.cloud.contactcenterinsights.v1.IssueModel.State state = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Configs for the input data that used to create the issue model.
     *
     * Generated from protobuf field <code>.google.cloud.contactcenterinsights.v1.IssueModel.InputDataConfig input_data_config = 6;</code>
     */
    private $input_data_config = null;
    /**
     * Output only. Immutable. The issue model's label statistics on its training data.
     *
     * Generated from protobuf field <code>.google.cloud.contactcenterinsights.v1.IssueModelLabelStats training_stats = 7 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $training_stats = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Immutable. The resource name of the issue model.
     *           Format:
     *           projects/{project}/locations/{location}/issueModels/{issue_model}
     *     @type string $display_name
     *           The representative name for the issue model.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. The time at which this issue model was created.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. The most recent time at which the issue model was updated.
     *     @type int $state
     *           Output only. State of the model.
     *     @type \Google\Cloud\ContactCenterInsights\V1\IssueModel\InputDataConfig $input_data_config
     *           Configs for the input data that used to create the issue model.
     *     @type \Google\Cloud\ContactCenterInsights\V1\IssueModelLabelStats $training_stats
     *           Output only. Immutable. The issue model's label statistics on its training data.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Contactcenterinsights\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. The resource name of the issue model.
     * Format:
     * projects/{project}/locations/{location}/issueModels/{issue_model}
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Immutable. The resource name of the issue model.
     * Format:
     * projects/{project}/locations/{location}/issueModels/{issue_model}
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
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
     * The representative name for the issue model.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * The representative name for the issue model.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->display_name = $var;

        return $this;
    }

    /**
     * Output only. The time at which this issue model was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The time at which this issue model was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The most recent time at which the issue model was updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The most recent time at which the issue model was updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. State of the model.
     *
     * Generated from protobuf field <code>.google.cloud.contactcenterinsights.v1.IssueModel.State state = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. State of the model.
     *
     * Generated from protobuf field <code>.google.cloud.contactcenterinsights.v1.IssueModel.State state = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\ContactCenterInsights\V1\IssueModel\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Configs for the input data that used to create the issue model.
     *
     * Generated from protobuf field <code>.google.cloud.contactcenterinsights.v1.IssueModel.InputDataConfig input_data_config = 6;</code>
     * @return \Google\Cloud\ContactCenterInsights\V1\IssueModel\InputDataConfig|null
     */
    public function getInputDataConfig()
    {
        return $this->input_data_config;
    }

    public function hasInputDataConfig()
    {
        return isset($this->input_data_config);
    }

    public function clearInputDataConfig()
    {
        unset($this->input_data_config);
    }

    /**
     * Configs for the input data that used to create the issue model.
     *
     * Generated from protobuf field <code>.google.cloud.contactcenterinsights.v1.IssueModel.InputDataConfig input_data_config = 6;</code>
     * @param \Google\Cloud\ContactCenterInsights\V1\IssueModel\InputDataConfig $var
     * @return $this
     */
    public function setInputDataConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\ContactCenterInsights\V1\IssueModel\InputDataConfig::class);
        $this->input_data_config = $var;

        return $this;
    }

    /**
     * Output only. Immutable. The issue model's label statistics on its training data.
     *
     * Generated from protobuf field <code>.google.cloud.contactcenterinsights.v1.IssueModelLabelStats training_stats = 7 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Cloud\ContactCenterInsights\V1\IssueModelLabelStats|null
     */
    public function getTrainingStats()
    {
        return $this->training_stats;
    }

    public function hasTrainingStats()
    {
        return isset($this->training_stats);
    }

    public function clearTrainingStats()
    {
        unset($this->training_stats);
    }

    /**
     * Output only. Immutable. The issue model's label statistics on its training data.
     *
     * Generated from protobuf field <code>.google.cloud.contactcenterinsights.v1.IssueModelLabelStats training_stats = 7 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Cloud\ContactCenterInsights\V1\IssueModelLabelStats $var
     * @return $this
     */
    public function setTrainingStats($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\ContactCenterInsights\V1\IssueModelLabelStats::class);
        $this->training_stats = $var;

        return $this;
    }

}

