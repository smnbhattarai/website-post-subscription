## Setup
- Clone the repo
- Run ``composer install``
- Add database details (MySQL)
- run ``php artisan migrate --seed`` to create table along with some fake data
- Since application uses queue make sure you set ``QUEUE_CONNECTION=database`` if you want to test using queue

## Subscription email implementation
- At the end of the day, all new added post added that day is picked up by the scheduler.
- Users who are subscribed to the website are then send email about new post using Queue.
- Command that runs during the email process is ``php artisan app:send-subscription-emails``

## API documentation
- API documentation can be found at ``http://localhost:8000/docs`` and can be regenerated using command ``php artisan scribe:generate``
