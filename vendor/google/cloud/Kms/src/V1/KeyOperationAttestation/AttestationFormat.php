<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/kms/v1/resources.proto

namespace Google\Cloud\Kms\V1\KeyOperationAttestation;

use UnexpectedValueException;

/**
 * Attestation formats provided by the HSM.
 *
 * Protobuf type <code>google.cloud.kms.v1.KeyOperationAttestation.AttestationFormat</code>
 */
class AttestationFormat
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>ATTESTATION_FORMAT_UNSPECIFIED = 0;</code>
     */
    const ATTESTATION_FORMAT_UNSPECIFIED = 0;
    /**
     * Cavium HSM attestation compressed with gzip. Note that this format is
     * defined by Cavium and subject to change at any time.
     * See
     * https://www.marvell.com/products/security-solutions/nitrox-hs-adapters/software-key-attestation.html.
     *
     * Generated from protobuf enum <code>CAVIUM_V1_COMPRESSED = 3;</code>
     */
    const CAVIUM_V1_COMPRESSED = 3;
    /**
     * Cavium HSM attestation V2 compressed with gzip. This is a new format
     * introduced in Cavium's version 3.2-08.
     *
     * Generated from protobuf enum <code>CAVIUM_V2_COMPRESSED = 4;</code>
     */
    const CAVIUM_V2_COMPRESSED = 4;

    private static $valueToName = [
        self::ATTESTATION_FORMAT_UNSPECIFIED => 'ATTESTATION_FORMAT_UNSPECIFIED',
        self::CAVIUM_V1_COMPRESSED => 'CAVIUM_V1_COMPRESSED',
        self::CAVIUM_V2_COMPRESSED => 'CAVIUM_V2_COMPRESSED',
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttestationFormat::class, \Google\Cloud\Kms\V1\KeyOperationAttestation_AttestationFormat::class);
