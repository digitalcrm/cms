# web.php (routes)
<p>add these routes in your web.php</p>

```
Route::group(['middleware' => ['auth'], 'namespace' => 'Ajax'], function () {

    Route::get('eventStatus','AjaxController@eventStatus')->name('auth.eventStatus');

});
Route::group(['namespace' => 'Bookings'], function () {

    /* Booking Services routes */
    Route::resource('bookservices', 'BookingServiceController')->except([
        'create', 'store', 'update', 'destroy', 'show', 'edit',
    ]);

    Route::get('activity_type', 'BookingActivityTypeController')->name('activity_type');

    /* Booking Create Events routes*/
    Route::resource('bookevents', 'BookingEventController');

    /* list of services at front side */
    Route::get('bookings', 'BookingController')->name('bookings');

    /* calendar list */
    Route::get('calendar', 'BookingEventController@allBookingEvent')->name('allBookingEvent');
    Route::get('bookingeventdata', 'BookingEventController@calendarlist');

    /* services having list of events show */
    Route::get('bookings/{bookservice:service_name}', 'BookingHomePageController@service_has_list_of_events')->name('service.events');

    /* guest user Booking form route */
    Route::get('bookings/{bookservice:service_name}/event/{bookevent}', 'BookingHomePageController@create')->name('event.create');
    Route::post('bookings/{bookservice:service_name}/event/{bookevent}', 'BookingHomePageController@store')->name('event.store');

    });
```

# app directory

<p>under app directory put these folders</p>

### Model 

put these file inside `app` directory

- [X] Move `BookingConfirmed.php` file inside `Mail` directory 
- [X] BookingActivity.php 
- [X] BookingCustomer.php 
- [X] BookingEvent.php 
- [X] BookingService.php

**OR** 
Inside `User.php` Model put this line of code

```
    public function BookingEvents()
    {
        return $this->hasMany( BookingEvent::class );
    }

```     
### App\Http Directory

Inside `app\Http` directory put this folders and files

- [X] `Livewire` move this folder directly inside `Http` diectory.
- [X] Inside `Controllers` folder move this folder `Ajax` & `Bookings`
- [X] Inside `Request` folder put this file `BookingEventRequest.php`
- [X] Inside `Resource` folder put this file `BookingEventResource.php`


# Resources Views

Inside `views` directory move these folder and directory.

- [X] Move directly `livewire` folder inside `views` folder
- [X] Inside emails directory move this directory `bookings` which is inside the email directory.
- [X] Inside views directory move directly this folder `bookings`.


# SideBar Menu add

```

                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Appointment
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bookevents.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Events
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('allBookingEvent') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Calendar
                                </p>
                            </a>
                        </li>
                    </ul>
                </li> <!--booking dropdown end here -->
```
