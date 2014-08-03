Jumph [![Build Status](https://travis-ci.org/jumph-io/Jumph.svg?branch=master)](https://travis-ci.org/jumph-io/Jumph) [![Coverage Status](https://coveralls.io/repos/jumph-io/Jumph/badge.png?branch=master)](https://coveralls.io/r/jumph-io/Jumph?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jumph-io/Jumph/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jumph-io/Jumph/?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/10b7bd65-d1b4-41d7-9569-2ffee88014b7/mini.png)](https://insight.sensiolabs.com/projects/10b7bd65-d1b4-41d7-9569-2ffee88014b7)
=====

**Description**

Jumph is a simple open source project management tool based on the Symfony Framework.

Currently in development:
- Project management
- Client management
- Issue tracker
- Time tracker
- Saving of emails
- Keeping track of quotations

Future plans:
- API
- Native mobile apps

Screenshots
=====

![Jumph Dashboard](http://i57.tinypic.com/fonjac.png)


Installation
=====

Jumph is not production ready yet. However, if you want to install it already or you want to contribute, follow these steps:
- Run `bower install`
- Run `composer install`
- Make sure a database is present and the connection has been set
- Run `php app/console doctrine:schema:update --force`
- Open up Jumph and register yourself on the temporary registration page

Demo
=====
Go to https://jumph.peternijssen.nl

log in with "peter" / "jumph2014"


Contributing
=====

Thanks for considering to contribute. You can contribute by creating pull requests. I am looking forward to your fixes, improvements and new features. This project is very much helped with all the issues you can resolve, any improvements you can make or unit tests you can set up.

Translating
=====

Currently, no language files have been created. Feel free to help out. When done, translating Jumph will become possible.

Authors
=====

Jumph was originally created by [Peter Nijssen](https://www.peternijssen.nl).
See the list of [contributors](https://github.com/jumph-io/Jumph/graphs/contributors).

The theme is named [AdminLTE](https://github.com/almasaeed2010/AdminLTE) and is created by [Almsaeed Studio](http://www.almsaeedstudio.com/).
