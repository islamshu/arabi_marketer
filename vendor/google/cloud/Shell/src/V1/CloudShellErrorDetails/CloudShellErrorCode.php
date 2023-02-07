<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/shell/v1/cloudshell.proto

namespace Google\Cloud\Shell\V1\CloudShellErrorDetails;

use UnexpectedValueException;

/**
 * Set of possible errors returned from API calls.
 *
 * Protobuf type <code>google.cloud.shell.v1.CloudShellErrorDetails.CloudShellErrorCode</code>
 */
class CloudShellErrorCode
{
    /**
     * An unknown error occurred.
     *
     * Generated from protobuf enum <code>CLOUD_SHELL_ERROR_CODE_UNSPECIFIED = 0;</code>
     */
    const CLOUD_SHELL_ERROR_CODE_UNSPECIFIED = 0;
    /**
     * The image used by the Cloud Shell environment either does not exist or
     * the user does not have access to it.
     *
     * Generated from protobuf enum <code>IMAGE_UNAVAILABLE = 1;</code>
     */
    const IMAGE_UNAVAILABLE = 1;
    /**
     * Cloud Shell has been disabled by an administrator for the user making the
     * request.
     *
     * Generated from protobuf enum <code>CLOUD_SHELL_DISABLED = 2;</code>
     */
    const CLOUD_SHELL_DISABLED = 2;
    /**
     * Cloud Shell has been permanently disabled due to a Terms of Service
     * violation by the user.
     *
     * Generated from protobuf enum <code>TOS_VIOLATION = 4;</code>
     */
    const TOS_VIOLATION = 4;
    /**
     * The user has exhausted their weekly Cloud Shell quota, and Cloud Shell
     * will be disabled until the quota resets.
     *
     * Generated from protobuf enum <code>QUOTA_EXCEEDED = 5;</code>
     */
    const QUOTA_EXCEEDED = 5;
    /**
     * The Cloud Shell environment is unavailable and cannot be connected to at
     * the moment.
     *
     * Generated from protobuf enum <code>ENVIRONMENT_UNAVAILABLE = 6;</code>
     */
    const ENVIRONMENT_UNAVAILABLE = 6;

    private static $valueToName = [
        self::CLOUD_SHELL_ERROR_CODE_UNSPECIFIED => 'CLOUD_SHELL_ERROR_CODE_UNSPECIFIED',
        self::IMAGE_UNAVAILABLE => 'IMAGE_UNAVAILABLE',
        self::CLOUD_SHELL_DISABLED => 'CLOUD_SHELL_DISABLED',
        self::TOS_VIOLATION => 'TOS_VIOLATION',
        self::QUOTA_EXCEEDED => 'QUOTA_EXCEEDED',
        self::ENVIRONMENT_UNAVAILABLE => 'ENVIRONMENT_UNAVAILABLE',
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

