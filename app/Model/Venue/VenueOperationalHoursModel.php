<?php

namespace App\Model\Venue;

use Illuminate\Database\Eloquent\Model;

class VenueOperationalHoursModel extends Model
{
    protected $table = 'venue_operational_hours';
    protected $primaryKey = 'id_venue_oh';
}
