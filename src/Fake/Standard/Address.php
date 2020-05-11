<?php

namespace Phony\Fake\Standard;

use Phony\Fake\Fake;
use Phony\Operation;

/**
 * Class Address.
 *
 *
 * @property-read string city
 * @property-read string city_with_state
 * @property-read string street_name
 * @property-read string secondary_address
 * @property-read string street_address
 * @property-read string street_address_with_secondary_address
 * @property-read string building_number
 * @property-read string community
 * @property-read string mail_box
 * @property-read string time_zone
 * @property-read string street_suffix
 * @property-read string city_suffix
 * @property-read string city_prefix
 * @property-read string state_abbreviation
 * @property-read string state
 * @property-read string country
 * @property-read string country_code
 * @property-read string country_code_long
 * @property-read string full_address
 * @property-read string default_country
 * @property-read string zip_code
 * @property-read string zip
 * @property-read string postcode
 * @property float latitude
 * @property float longitude
 * @property array coordinate
 * @method zip(?string $stateAbbreviation = null): string
 * @method postcode(?string $stateAbbreviation = null): string
 */
class Address extends Fake
{
    protected array $attributes = [
        'city'                                  => ['address.city'],
        'city_with_state'                       => ['address.city_with_state'],
        'street_name'                           => ['address.street_name'],
        'secondary_address'                     => ['address.secondary_address', Operation::numerify],
        'street_address'                        => ['address.street_address', Operation::numerify],
        'street_address_with_secondary_address' => ['address.street_address_with_secondary_address', Operation::bothify],
        'building_number'                       => ['address.building_number', Operation::bothify],
        'community'                             => ['address.community'],
        'mail_box'                              => ['address.mail_box', Operation::bothify],
        'time_zone'                             => ['address.time_zone'],
        'street_suffix'                         => ['address.street_suffix'],
        'city_suffix'                           => ['address.city_suffix'],
        'city_prefix'                           => ['address.city_prefix'],
        'state_abbreviation'                    => ['address.state_abbreviation'],
        'state'                                 => ['address.state'],
        'country'                               => ['address.country'],
        'country_code'                          => ['address.country_code'],
        'country_code_long'                     => ['address.country_code_long'],
        'full_address'                          => ['address.full_address', Operation::numerify],
        'default_country'                       => ['address.default_country'],
    ];

    protected array $methodsAsAttributes = [
        'zip_code'    => [],
        'latitude'    => [],
        'coordinates' => [],
    ];

    protected array $methodAliases = [
        'zip'      => 'zip_code',
        'postcode' => 'zip_code',
    ];

    /**
     * Fakes a random zip code.
     *
     * @param  string  $stateAbbreviation
     *
     * @return string
     *
     *
     * @example 🙃::address()->zip_code() // => "58517"
     * @example 🙃::address()->zip_code() // => "23285-4905"
     * @example 🙃::address()->zip_code('CO') // => "80011"
     */
    public function zip_code(?string $stateAbbreviation = null): string
    {
        if (empty($stateAbbreviation)) {
            return $this->bothify(
                $this->fetch('address.postcode')
            );
        }

        return $this->bothify(
            $this->fetch('address.postcode_by_state', $stateAbbreviation)
        );
    }

    /**
     * Fakes a random country by an ISO 3166 country code.
     *
     * @param  string  $code
     *
     * @return string
     *
     * @example 🙃::address()->country_by_code('NL') // => "Netherlands"
     */
    public function country_by_code(string $code): string
    {
        return $this->fetch('address.country_by_code', $code);
    }

    /**
     * Fakes a random ISO 3166 country by country name.
     *
     * @param  string  $name
     *
     * @return string
     *
     * @example 🙃::address()->country_by_name('united_states') // => "US"
     */
    public function country_by_name(string $name): string
    {
        return $this->fetch('address.country_by_name', $name);
    }

    /**
     * Fakes a random latitude.
     *
     * precision    degrees     distance
     * -------------------------------
     * 0            1.0         111 km
     * 1            0.1         11.1 km
     * 2            0.01        1.11 km
     * 3            0.001       111 m
     * 4            0.0001      11.1 m
     * 5            0.00001     1.11 m
     * 6            0.000001    0.111 m
     * 7            0.0000001   1.11 cm
     * 8            0.00000001  1.11 mm
     * Reference:
     * https://en.wikipedia.org/wiki/Decimal_degrees#Precision
     *
     * @param  int  $precision
     * @param  int  $min
     * @param  int  $max
     *
     * @return float
     *
     * @example 🙃::address()->latitude() // => -58.17256227443719
     */
    public function latitude(int $precision = 7, int $min = -90, int $max = 90): float
    {
        return $this->phony->number->floatBetween($max, $min, $precision);
    }

    /**
     * Fakes a random longitude.
     *
     * precision    degrees     distance
     * -------------------------------
     * 0            1.0         111 km
     * 1            0.1         11.1 km
     * 2            0.01        1.11 km
     * 3            0.001       111 m
     * 4            0.0001      11.1 m
     * 5            0.00001     1.11 m
     * 6            0.000001    0.111 m
     * 7            0.0000001   1.11 cm
     * 8            0.00000001  1.11 mm
     * Reference:
     * https://en.wikipedia.org/wiki/Decimal_degrees#Precision
     *
     * @param  int  $precision
     * @param  int  $min
     * @param  int  $max
     *
     * @return float
     *
     * @example 🙃::address()->longitude() // => -156.65548382095133
     */
    public function longitude(int $precision = 7, int $min = -180, int $max = 180): float
    {
        return $this->phony->number->floatBetween($max, $min, $precision);
    }

    /**
     * Fakes a random coordinate array that contains latitude and longitude.
     *
     * @param  int  $precision
     * @param  int  $minLatitude
     * @param  int  $maxLatitude
     * @param  int  $minLongitude
     * @param  int  $maxLongitude
     *
     * @return array
     */
    public function coordinate(
        int $precision = 7,
        int $minLatitude = -90,
        int $maxLatitude = 90,
        int $minLongitude = -180,
        int $maxLongitude = 180
    ): array {
        return [
            $this->latitude($precision, $minLatitude, $maxLatitude),
            $this->longitude($precision, $minLongitude, $maxLongitude),
        ];
    }
}
