<?php


class ContactTest extends TestCase
{
    /**
     * Shows user's contacts
     *
     * @test
     */
    public function it_shows_a_users_contacts()
    {
        $this->visit('contacts')
            ->see('No contacts added yet!');

        factory(\App\Contact::class, 15)->create(['user_id' => $this->user->id]);

        //Another users contacts
        factory(\App\Contact::class, 18)->create();

        $this->visit('contacts')
            ->see('10 / 15 contacts');

        $this->visit('contacts?page=2')
            ->see('5 / 15 contacts');
    }

    /**
     * Shows a user's contact's details
     *
     * @test
     */
    public function it_shows_a_users_contacts_details()
    {


        $contact = factory(\App\Contact::class)->create(['user_id' => $this->user->id]);
        $anothers = factory(\App\Contact::class)->create();

        $this->visit('contacts/' . $contact->id)
            ->see($contact->first_name)
            ->see($contact->last_name)
            ->see($contact->email)
            ->see($contact->phone)
            ->see($contact->notes);

        $this->visit('contacts/' . $anothers->id)
            ->see('Whoops! Page not found!');
    }

    /**
     * A user can create a contact
     *
     * @test
     */
    public function a_user_can_manage_their_contacts()
    {

        $contact = factory(\App\Contact::class)->make();

        //Create contact
        $this->visit('contacts')
            ->see('No contacts added yet')
            ->click('Add Contact')
            ->see('Enter contact details')
            ->type($contact->first_name, 'first_name')
            ->type($contact->last_name, 'last_name')
            ->type($contact->email, 'email')
            ->type($contact->phone, 'phone')
            ->type($contact->notes, 'notes')
            ->press('Submit')
            ->seePageIs('contacts')
            ->see('1 / 1 Contacts')
            ->see($contact->first_name . ' ' . $contact->last_name);

        //View details
        $contact = $this->user->contacts()->first();
        $this->click($contact->first_name . ' ' . $contact->last_name)
            ->seePageIs('contacts/' . $contact->id)
            ->see($contact->first_name)
            ->see($contact->last_name)
            ->see($contact->email)
            ->see($contact->phone)
            ->see($contact->notes);

        //Update details

        $this->click('edit-contact')
            ->seePageIs('contacts/' . $contact->id . '/edit')
            ->type('NewFname', 'first_name')
            ->type('NewLname', 'last_name')
            ->type('email@example.inc', 'email')
            ->type('123454321', 'phone')
            ->type('I just updated you', 'notes')
            ->press('Submit')
            ->seePageIs('contacts/' . $contact->id)
            ->see('NewFname')
            ->see('NewLname')
            ->see('email@example.inc')
            ->see('123454321')
            ->see('I just updated you');

//Todo: find a way to delete without
        //Delete Contact

        $this->press('Delete')
            ->seePageIs('contacts')
            ->dontSee('NewFname')
            ->dontSee('NewLname');


    }
}
