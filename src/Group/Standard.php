<?php

namespace Phonyland\Group;

use Phonyland\Group;

/**
 * Class Standard.
 *
 *
 * @property-read \Phonyland\Fake\Standard\Address    address
 * @property-read \Phonyland\Fake\Standard\Address    📫
 * @property-read \Phonyland\Fake\Standard\Alphabet   alphabet
 * @property-read \Phonyland\Fake\Standard\Alphabet   🔤
 * @property-read \Phonyland\Fake\Standard\Ancient    ancient
 * @property-read \Phonyland\Fake\Standard\Ancient    📜
 * @property-read \Phonyland\Fake\Standard\Artist     artist
 * @property-read \Phonyland\Fake\Standard\Boolean    boolean
 * @property-read \Phonyland\Fake\Standard\Coin       coin
 * @property-read \Phonyland\Fake\Standard\Cosmere    cosmere
 * @property-read \Phonyland\Fake\Standard\Currency   currency
 * @property-read \Phonyland\Fake\Standard\Number     number
 * @property-read \Phonyland\Fake\Standard\Person     person
 * @property-read \Phonyland\Fake\Standard\SlackEmoji slack_emoji
 */
class Standard extends Group
{
    public array $fakes = [
        'address'     => \Phonyland\Fake\Standard\Address::class,
        '📫'          => \Phonyland\Fake\Standard\Address::class,
        'alphabet'    => \Phonyland\Fake\Standard\Alphabet::class,
        '🔤'          => \Phonyland\Fake\Standard\Alphabet::class,
        'ancient'     => \Phonyland\Fake\Standard\Ancient::class,
        '📜'          => \Phonyland\Fake\Standard\Ancient::class,
        'artist'      => \Phonyland\Fake\Standard\Artist::class,
        'boolean'     => \Phonyland\Fake\Standard\Boolean::class,
        'coin'        => \Phonyland\Fake\Standard\Coin::class,
        'cosmere'     => \Phonyland\Fake\Standard\Cosmere::class,
        'currency'    => \Phonyland\Fake\Standard\Currency::class,
        'number'      => \Phonyland\Fake\Standard\Number::class,
        'person'      => \Phonyland\Fake\Standard\Person::class,
        'slack_emoji' => \Phonyland\Fake\Standard\SlackEmoji::class,
    ];
}
