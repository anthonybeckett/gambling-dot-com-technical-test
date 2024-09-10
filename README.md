# Gambling.com Technical Test

This is my finished version of the Gambling.com technical test. For this project I have  
decided to use Laravel 11 and Vue JS with InertiaJS just so all my work was in one place.

It took me approximately 2 hours to get this much done and wanted to keep to that kind of timeframe. I will be honest and say I have
used a library for the GreatCircle calculation as I could not understand the Maths on wikipedia.

I have got one end point which just goes to the home URL and points to `AffiliateController` and `Affiliate` page in the frontend.  

All my business logic has been moved into the `domain` folder calling one action in the Controller.

## Building and running the project

To start the project, you will need docker & docker compose. I have used Sail for the backend so you can simply run the following

```bash
./vendor/bin/sail up -d
```

The frontend is handled by Vue & Vite and can be run using this command

```bash
npm run dev
```

You can also check tests are passing

```bash
./vendor/bin/sail artisan test
```
