# API to Upload Audio File

## Description
This module is to learn how to built an API to Upload Audio file using Laravel and blade templating engine.


# Setup 

* clone the repository

## PHP (backend)
* `composer install`
* copy `cp .env.example .env`
* generate key `php artisan key:generate`
* migrate `php artisan migrate`
* serve `php artisan serve`

## Node (front)
* run `npm install`
* run `npm run dev`

### Testing the API(Using POSTMAN)
* Set up a POST request to http://127.0.0.1:8000/api/customer/file_upload
* In the Body tab, select form-data.
   - name: Name of the audio call.
   - file: Select an audio file (MP3 or WAV).
   - language: Language of the audio call.
   - created_by: User ID who created the call.