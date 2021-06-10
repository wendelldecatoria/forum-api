# REX Backend Test

## Overview 

The Good Forum (tm) is an API application built based on [Laravel 5.6](https://laravel.com/).
It was hastily built by some Junior developers, and it needs a little bit of love.
We would like you to help improve this application by completing the tasks outlined below.

This API will be utilised by a React frontend. 

![Mockup of Forum Messages](resources/assets/img/mockup-forum-messages.png)

### Test Guidelines

* We suggest you spend no more than 3 hours on the test.
* Complete the tasks as outlined below, creating branches and accompanying PR's as you go.
* Feel free to add any of your own improvements, be sure to identify them in your commit messages.
* Make sure you replace this README with your own, add any suggestions to developers for getting started (see final task).
* Once you've completed you work, please let us know so we can review.

We would appreciate you indicating which tasks you are addressing in your commits or PR messages. If you cannot complete all tasks in the time allotted, commentary or pseduo code indicating your intended approach can be a good alterative.

Other hints: feel free to use community packages, you don't have to write everything yourself. Use the PHP ecosystem.

### Tasks

#### Task 1 - Add seeds

Currently our seeds are incomplete. This makes it hard to test the application and for our frontend team to work on the 
interface.  Please add seeds for the following models:

- Sections
- Topics
- Messages

It would be great of there were some message seeds demonstrating the nested parent_id relationship that messages
within a topic can have.

#### Task 2 - Transform output

Our controller methods currently return our api output by just returning the model directly, but it's becoming a problem 
because every time we update our model properties we break what is expected from our API.  Also, we would like all our 
dates to be returned in UTC format.

* Change the methods in `Api\UserProfileController` and `Api\MessageController` to transform the output resources.
* Only return the resource fields necessary.
* Ensure all dates are output in UTC format.
* Write a test to ensure that it outputs what you expect it to.

Note there are packages available that can help you with this, or you can roll your own solution.

#### Task 3 - Add user avatars

Our UX team has made an update, and they'd like us to add avatars to `user` profiles so that the design 'pops'. 
Please implement the ability for our users to have a single OPTIONAL avatar image on their profile:

- Extend models and migrations, and seeds.
- Create appropriate methods or controllers.
- Write appropriate test to ensure that you can retrieve and update an avatar for a user.
- Would be good if the image storage was flexible enough to change to an s3 bucket in the future.
- Update any resource transformations so that the user profile includes the avatar URL (if an avatar is set).

#### Task 4 - Add a new endpoint which gives you all the messages for a topic

We already have a global endpoint for fetching messages, but we need to get them for a particular topic ID.

- Create a new endpoint which returns only messages for a given topic.
- Allow ordering by date, or alphabetically.

#### Task 5 - Add pagination to the messages controller

Wow, we're so popular right now. The list of messages returned from the GET `/api/v1/messages` endpoint is pretty
big. 

- Implement pagination on the messages controller.
- The response should include the pagination details for fetching the next page.

#### Task 6 - Fix the messages controller

Ok so there's a couple of big problems with the messages controller.

- The validation is pretty bad
- You shouldn't be able to link a message to a parent_id that doesn't share the same topic_id
- We need a test to ensure that all this is working

#### Task 7 - Improve database indexes

Currently none of the database tables have any indexes defined. 

* Add indexes where appropriate (hint: sections, messages, topics)
* Explain how you measured the usefulness of these indexes
* Don't add indexes that wont be used though

#### Task 8 - Write a new README

Now that you've completed the tasks, please replace this README with a suitable one for the project.
It should provide a good overview of your project, how it should be installed and configured for DEV and PROD and an explanation of anything that is currently incomplete. Perhaps some ideas for what could be improved in the future.

## Installation

### Requirements

- PHP 7.0
- Postgresql or MySQL

### Configure

```bash
cp .env.example .env
```

Edit the `.env` file to update database credentials

### Install dependencies

```bash
composer install
```

### Run tests

```bash
composer tests
```

### Run application

```bash
php artisan serve
```

Application available from: `http://localhost/`

### Access the API

The API is RESTful:

#### Sections

Sections contain topics. Each section breaks the forum up into logically grouped areas. Eg. the "Crypto" section.

- List of sections: `GET /api/v1/sections`
- Retrieve section: `GET /api/v1/sections/{id}`
- Create a new section: `POST /api/v1/sections`
- Update a section: `PATCH /api/v1/sections/{id}`
- Delete a section: `DELETE /api/v1/sections/{id}`

#### Topics

Topics group together messages within a section.  An example topic in the "Crypto" section might be "I just mortgaged 
my house and now BTC is only worth 3k :scream:".

- List of topics: `GET /api/v1/topics`
- Retrieve topic: `GET /api/v1/topics/{id}`
- Create a new topic: `POST /api/v1/topics`
- Update a topic: `PATCH /api/v1/topics/{id}`
- Delete a topic: `DELETE /api/v1/topics/{id}`
- Get topic thread: `GET /api/v1/topics/{id}/thread`

#### Messages

Messages are created within a topic and may have a parent_id for nested relationships.

- List of messages: `GET /api/v1/messages`
- Retrieve message: `GET /api/v1/messages/{id}`
- Create a new message: `POST /api/v1/messages`
- Update a message: `PATCH /api/v1/messages/{id}`
- Delete a message: `DELETE /api/v1/messages/{id}`

#### Users

Users are the entities within the system that can create messages, and topics.

- List of users: `GET /api/v1/users`
- Retrieve user: `GET /api/v1/users/{id}`
- Create/register a new user: `POST /api/v1/users`
- Update a user: `PATCH /api/v1/users/{id}`
- Delete a user: `DELETE /api/v1/users/{id}`
- Retrieve user profile: `GET /api/v1/users/{id}/profile`
- Update user profile: `PATCH /api/v1/users/{id}/profile`

