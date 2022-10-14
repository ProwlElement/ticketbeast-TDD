<?php

use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewConcertListingTest extends TestCase
{
  use DatabaseMigrations;

  
  /** @test */
  public function user_can_view_a_concert_listing() {

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
        $response = $this->get('/concerts/' . $concert->id);

      //Assert                                           
      
        // see the concert details
        $this->assertSee('The Red Chord');
        $this->assertSee('with Anamosity and Thin Lizzy');
        $this->assertSee('December 13, 2016');
        $this->assertSee('8:00pm');
        $this->assertSee('32.50');
        $this->assertSee('Moon Mosh Pit');
        $this->assertSee('123 Example Court');
        $this->assertSee('Dubklin');
        $this->assertSee('IRL');
        $this->assertSee('123456');
        $this->assertSee('For tickets, call (555) 555-555');
        
  }
}
