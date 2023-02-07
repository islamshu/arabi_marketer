<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/dataflow/v1beta3/streaming.proto

namespace Google\Cloud\Dataflow\V1beta3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Describes full or partial data disk assignment information of the computation
 * ranges.
 *
 * Generated from protobuf message <code>google.dataflow.v1beta3.StreamingComputationRanges</code>
 */
class StreamingComputationRanges extends \Google\Protobuf\Internal\Message
{
    /**
     * The ID of the computation.
     *
     * Generated from protobuf field <code>string computation_id = 1;</code>
     */
    private $computation_id = '';
    /**
     * Data disk assignments for ranges from this computation.
     *
     * Generated from protobuf field <code>repeated .google.dataflow.v1beta3.KeyRangeDataDiskAssignment range_assignments = 2;</code>
     */
    private $range_assignments;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $computation_id
     *           The ID of the computation.
     *     @type array<\Google\Cloud\Dataflow\V1beta3\KeyRangeDataDiskAssignment>|\Google\Protobuf\Internal\RepeatedField $range_assignments
     *           Data disk assignments for ranges from this computation.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Dataflow\V1Beta3\Streaming::initOnce();
        parent::__construct($data);
    }

    /**
     * The ID of the computation.
     *
     * Generated from protobuf field <code>string computation_id = 1;</code>
     * @return string
     */
    public function getComputationId()
    {
        return $this->computation_id;
    }

    /**
     * The ID of the computation.
     *
     * Generated from protobuf field <code>string computation_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setComputationId($var)
    {
        GPBUtil::checkString($var, True);
        $this->computation_id = $var;

        return $this;
    }

    /**
     * Data disk assignments for ranges from this computation.
     *
     * Generated from protobuf field <code>repeated .google.dataflow.v1beta3.KeyRangeDataDiskAssignment range_assignments = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRangeAssignments()
    {
        return $this->range_assignments;
    }

    /**
     * Data disk assignments for ranges from this computation.
     *
     * Generated from protobuf field <code>repeated .google.dataflow.v1beta3.KeyRangeDataDiskAssignment range_assignments = 2;</code>
     * @param array<\Google\Cloud\Dataflow\V1beta3\KeyRangeDataDiskAssignment>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRangeAssignments($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dataflow\V1beta3\KeyRangeDataDiskAssignment::class);
        $this->range_assignments = $arr;

        return $this;
    }

}

