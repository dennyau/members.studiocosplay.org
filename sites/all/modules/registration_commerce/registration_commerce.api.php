<?php
/**
 * @file
 * API documentation for Registration Commerce module.
 */

/**
 * Override the line item price for a registration.
 *
 * @param Registration $registration
 *   The Registration entity being paid for.
 * @param array $info
 *   $info as provided to entity metadata callbacks.
 *
 * @return array
 *   A Commerce Price Array. See Example below.
 */
function hook_registration_commerce_calculate_price($registration, $info) {
  return array(
    'amount' => 42,
    'currency' => 'USD',
  );
}
