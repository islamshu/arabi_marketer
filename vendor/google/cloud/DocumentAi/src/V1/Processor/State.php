<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/documentai/v1/processor.proto

namespace Google\Cloud\DocumentAI\V1\Processor;

use UnexpectedValueException;

/**
 * The possible states of the processor.
 *
 * Protobuf type <code>google.cloud.documentai.v1.Processor.State</code>
 */
class State
{
    /**
     * The processor is in an unspecified state.
     *
     * Generated from protobuf enum <code>STATE_UNSPECIFIED = 0;</code>
     */
    const STATE_UNSPECIFIED = 0;
    /**
     * The processor is enabled, i.e., has an enabled version which can
     * currently serve processing requests and all the feature dependencies have
     * been successfully initialized.
     *
     * Generated from protobuf enum <code>ENABLED = 1;</code>
     */
    const ENABLED = 1;
    /**
     * The processor is disabled.
     *
     * Generated from protobuf enum <code>DISABLED = 2;</code>
     */
    const DISABLED = 2;
    /**
     * The processor is being enabled, will become `ENABLED` if successful.
     *
     * Generated from protobuf enum <code>ENABLING = 3;</code>
     */
    const ENABLING = 3;
    /**
     * The processor is being disabled, will become `DISABLED` if successful.
     *
     * Generated from protobuf enum <code>DISABLING = 4;</code>
     */
    const DISABLING = 4;
    /**
     * The processor is being created, will become either `ENABLED` (for
     * successful creation) or `FAILED` (for failed ones).
     * Once a processor is in this state, it can then be used for document
     * processing, but the feature dependencies of the processor might not be
     * fully created yet.
     *
     * Generated from protobuf enum <code>CREATING = 5;</code>
     */
    const CREATING = 5;
    /**
     * The processor failed during creation or initialization of feature
     * dependencies. The user should delete the processor and recreate one as
     * all the functionalities of the processor are disabled.
     *
     * Generated from protobuf enum <code>FAILED = 6;</code>
     */
    const FAILED = 6;
    /**
     * The processor is being deleted, will be removed if successful.
     *
     * Generated from protobuf enum <code>DELETING = 7;</code>
     */
    const DELETING = 7;

    private static $valueToName = [
        self::STATE_UNSPECIFIED => 'STATE_UNSPECIFIED',
        self::ENABLED => 'ENABLED',
        self::DISABLED => 'DISABLED',
        self::ENABLING => 'ENABLING',
        self::DISABLING => 'DISABLING',
        self::CREATING => 'CREATING',
        self::FAILED => 'FAILED',
        self::DELETING => 'DELETING',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}


