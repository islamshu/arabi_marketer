<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/data_labeling_job.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * CMLE training config. For every active learning labeling iteration, system
 * will train a machine learning model on CMLE. The trained model will be used
 * by data sampling algorithm to select DataItems.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.TrainingConfig</code>
 */
class TrainingConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * The timeout hours for the CMLE training job, expressed in milli hours
     * i.e. 1,000 value in this field means 1 hour.
     *
     * Generated from protobuf field <code>int64 timeout_training_milli_hours = 1;</code>
     */
    private $timeout_training_milli_hours = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $timeout_training_milli_hours
     *           The timeout hours for the CMLE training job, expressed in milli hours
     *           i.e. 1,000 value in this field means 1 hour.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\DataLabelingJob::initOnce();
        parent::__construct($data);
    }

    /**
     * The timeout hours for the CMLE training job, expressed in milli hours
     * i.e. 1,000 value in this field means 1 hour.
     *
     * Generated from protobuf field <code>int64 timeout_training_milli_hours = 1;</code>
     * @return int|string
     */
    public function getTimeoutTrainingMilliHours()
    {
        return $this->timeout_training_milli_hours;
    }

    /**
     * The timeout hours for the CMLE training job, expressed in milli hours
     * i.e. 1,000 value in this field means 1 hour.
     *
     * Generated from protobuf field <code>int64 timeout_training_milli_hours = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTimeoutTrainingMilliHours($var)
    {
        GPBUtil::checkInt64($var);
        $this->timeout_training_milli_hours = $var;

        return $this;
    }

}
