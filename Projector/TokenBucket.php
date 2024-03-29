<?php

declare(strict_types=1);

namespace Storm\Contract\Projector;

/**
 * Capacity (capacity):
 *
 * Represents the maximum number of tokens the bucket can hold. It is a fixed quantity that doesn't change over time.
 * When the bucket is full, it cannot accumulate more tokens.
 *
 * Rate (rate):
 *
 * It represents the rate at which tokens are added to the bucket per unit of time. Specified as tokens per second (e.g., 10 tokens/second).
 * The rate determines how quickly the bucket refills with tokens.
 *
 * Interaction:
 *
 * - If capacity is an integer, the bucket can hold a specific whole number of tokens.
 * - If rate is an integer, it represents the number of tokens added to the bucket every second.
 *
 * @example  with a capacity of five and a rate of 2,
 * the bucket can hold up to five tokens and refill at a rate of two tokens per second.
 *
 * Floating-Point Values:
 *
 * - If capacity or rate is a floating-point number, it allows for more precision in representing non-whole numbers.
 * @example a rate of 0.5 tokens per second means the bucket refills at half a token every second.
 *
 * Summary:
 * Suppose capacity is 10 and the rate is 2.5 tokens per second.
 * The bucket starts with 10 tokens. Every second, it adds 2.5 tokens.
 * After one second, the bucket will have 12.5 tokens. However, since capacity is 10, it can only hold up to 10 tokens. The excess tokens are ignored.
 * In summary, capacity sets the maximum limit for the number of tokens the bucket can hold, while rate how quickly defines the bucket refills with tokens.
 *
 * Note: when using withSleep, requested tokens cannot exceed the capacity of the bucket to avoid an infinite loop,
 * and the bucket is overflowed immediately.
 *
 * @property-read int|float $capacity
 * @property-read int|float $rate
 */
interface TokenBucket
{
    /**
     * Consume tokens from the bucket.
     */
    public function consume(float $tokens = 1): bool;

    /**
     * Get the number of remaining tokens in the bucket.
     */
    public function remainingTokens(): int|float;

    /**
     * Get the capacity of the bucket.
     */
    public function getCapacity(): int|float;

    /**
     * Get the rate of the bucket.
     */
    public function getRate(): int|float;
}
