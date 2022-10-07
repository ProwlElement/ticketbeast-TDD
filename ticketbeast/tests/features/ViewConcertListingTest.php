<?php

use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewConcertListingTest extends TestCase
{
  /** @test */
  function user_can_view_a_concert_listing() {
      //Arrange

        // create a concert
        $concert = Concert::create([
            'title' => 'The Red Chord',
            'subtitle' => 'with Anamosity and Thin Lizzy',
            'date' => Carbon::parse('December 13, 2016 8:00pm'),
            'ticket_price' => 3250,
            'venue' => 'Moon Mosh Pit',
            'venue_address' => '123 Example Court',
            'city' => 'Dublin',
            'state' => 'IRL',
            'zip' => '123456',
            'additional_information' => 'For tickets, call (555) 555-555',
        ]);

      //Act

        // view the concert listing
        $this->visit('/concerts/'.$concert->id);

      //Assert                                           
      
        // see the concert details
        $this->see('The Red Chord');
        $this->see('with Anamosity and Thin Lizzy');
        $this->see('December 13, 2016');
        $this->see('8:00pm');
        $this->see('32.50');
        $this->see('Moon Mosh Pit');
        $this->see('123 Example Court');
        $this->see('Dubklin');
        $this->see('IRL');
        $this->see('123456');
        $this->see('For tickets, call (555) 555-555');

    
  }
}
