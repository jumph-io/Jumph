Jumph [![Build Status](https://travis-ci.org/jumph-io/Jumph.svg?branch=master)](https://travis-ci.org/jumph-io/Jumph) [![Coverage Status](https://coveralls.io/repos/jumph-io/Jumph/badge.png?branch=master)](https://coveralls.io/r/jumph-io/Jumph?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jumph-io/Jumph/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jumph-io/Jumph/?branch=master) [![Dependency Status](https://www.versioneye.com/user/projects/54402a75e70de428bc0001a2/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54402a75e70de428bc0001a2) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/10b7bd65-d1b4-41d7-9569-2ffee88014b7/mini.png)](https://insight.sensiolabs.com/projects/10b7bd65-d1b4-41d7-9569-2ffee88014b7)
=====

**Description**

Jumph is a simple open source project management tool based on the Symfony Framework.

Currently finished:
- Project management
- Client management

Currently in development:
- Issue tracker
- Time tracker
- Saving of emails
- Calendar
- Dashboard

Future plans:
- Task management
- Quotations management
- Invoice management
- API

Screenshots
=====


![Jumph Calendar](http://i61.tinypic.com/311pac6.png)

![Jumph Projects](http://i61.tinypic.com/aahq82.png)


Installation
=====

Jumph is not production ready yet. However, if you want to install it already or you want to contribute, follow these steps:
- install gulp `npm install gulp`
- install gulp dependencies `npm install `
- run `gulp watch` to get assets
- Run `composer install` to install php dependencies
- Make sure a database is present and the connection has been set in `app/config/parameters.yml`
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
