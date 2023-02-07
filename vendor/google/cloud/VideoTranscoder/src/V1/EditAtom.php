<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/transcoder/v1/resources.proto

namespace Google\Cloud\Video\Transcoder\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Edit atom.
 *
 * Generated from protobuf message <code>google.cloud.video.transcoder.v1.EditAtom</code>
 */
class EditAtom extends \Google\Protobuf\Internal\Message
{
    /**
     * A unique key for this atom. Must be specified when using advanced
     * mapping.
     *
     * Generated from protobuf field <code>string key = 1;</code>
     */
    private $key = '';
    /**
     * List of `Input.key`s identifying files that should be used in this atom.
     * The listed `inputs` must have the same timeline.
     *
     * Generated from protobuf field <code>repeated string inputs = 2;</code>
     */
    private $inputs;
    /**
     * End time in seconds for the atom, relative to the input file timeline.
     * When `end_time_offset` is not specified, the `inputs` are used until
     * the end of the atom.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration end_time_offset = 3;</code>
     */
    private $end_time_offset = null;
    /**
     * Start time in seconds for the atom, relative to the input file timeline.
     * The default is `0s`.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration start_time_offset = 4;</code>
     */
    private $start_time_offset = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $key
     *           A unique key for this atom. Must be specified when using advanced
     *           mapping.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $inputs
     *           List of `Input.key`s identifying files that should be used in this atom.
     *           The listed `inputs` must have the same timeline.
     *     @type \Google\Protobuf\Duration $end_time_offset
     *           End time in seconds for the atom, relative to the input file timeline.
     *           When `end_time_offset` is not specified, the `inputs` are used until
     *           the end of the atom.
     *     @type \Google\Protobuf\Duration $start_time_offset
     *           Start time in seconds for the atom, relative to the input file timeline.
     *           The default is `0s`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Video\Transcoder\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * A unique key for this atom. Must be specified when using advanced
     * mapping.
     *
     * Generated from protobuf field <code>string key = 1;</code>
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * A unique key for this atom. Must be specified when using advanced
     * mapping.
     *
     * Generated from protobuf field <code>string key = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->key = $var;

        return $this;
    }

    /**
     * List of `Input.key`s identifying files that should be used in this atom.
     * The listed `inputs` must have the same timeline.
     *
     * Generated from protobuf field <code>repeated string inputs = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * List of `Input.key`s identifying files that should be used in this atom.
     * The listed `inputs` must have the same timeline.
     *
     * Generated from protobuf field <code>repeated string inputs = 2;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setInputs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->inputs = $arr;

        return $this;
    }

    /**
     * End time in seconds for the atom, relative to the input file timeline.
     * When `end_time_offset` is not specified, the `inputs` are used until
     * the end of the atom.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration end_time_offset = 3;</code>
     * @return \Google\Protobuf\Duration|null
     */
    public function getEndTimeOffset()
    {
        return $this->end_time_offset;
    }

    public function hasEndTimeOffset()
    {
        return isset($this->end_time_offset);
    }

    public function clearEndTimeOffset()
    {
        unset($this->end_time_offset);
    }

    /**
     * End time in seconds for the atom, relative to the input file timeline.
     * When `end_time_offset` is not specified, the `inputs` are used until
     * the end of the atom.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration end_time_offset = 3;</code>
     * @param \Google\Protobuf\Duration $var
     * @return $this
     */
    public function setEndTimeOffset($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Duration::class);
        $this->end_time_offset = $var;

        return $this;
    }

    /**
     * Start time in seconds for the atom, relative to the input file timeline.
     * The default is `0s`.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration start_time_offset = 4;</code>
     * @return \Google\Protobuf\Duration|null
     */
    public function getStartTimeOffset()
    {
        return $this->start_time_offset;
    }

    public function hasStartTimeOffset()
    {
        return isset($this->start_time_offset);
    }

    public function clearStartTimeOffset()
    {
        unset($this->start_time_offset);
    }

    /**
     * Start time in seconds for the atom, relative to the input file timeline.
     * The default is `0s`.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration start_time_offset = 4;</code>
     * @param \Google\Protobuf\Duration $var
     * @return $this
     */
    public function setStartTimeOffset($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Duration::class);
        $this->start_time_offset = $var;

        return $this;
    }

}
