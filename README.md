[![Build status](https://circleci.com/gh/lecaoquochung/liho-ubun.svg?style=shield)](https://circleci.com/gh/lecaoquochung/liho-ubun)
[![Build status](https://travis-ci.org/travis-ci/docs-travis-ci-com.svg?branch=master)](https://travis-ci.org/lecaoquochung/liho-ubun)

# LIHO-UBUN (lihoubun)
- Docker ubuntu for api development

# Dependencies
- Package included
```
- docker-composer version 3
- ubuntu 16.07 (nginx, curl)
- mysql 5.7.14
- php 7
- fuelphp 1.8
- sass 3.4.23
- python 2.7.12 & 3.5.2
```

# INIT
- Host file /etc/hosts
```
api-v1.lihoubun.dev
api-v2.lihoubun.dev
```

- Run CLI
```
./help build
./help init
./help up

# Start api v1
./help api v1
```

# Local development
- public_html
http://localhost:8080

# API
## V1 php7 fuelphp
- ping: api-v1.lihoubun.dev/api/v1/ping
## V2 php7 symfony
- ping: api-v2.lihoubun.dev/api/v2/ping
## V3 php7 lavarel
- ping: api-v3.lihoubun.dev/api/v3/ping
## V4 php7 cakephp
- ping: api-v4.lihoubun.dev/api/v4/ping
## V5 python django
- ping: api-v5.lihoubun.dev/api/v5/ping
## V6 java spring
- ping: api-v6.lihoubun.dev/api/v6/ping
## V7 hack hhmv
- ping: api-v7.lihoubun.dev/api/v7/ping
## V8 nodejs express
- ping: api-v8.lihoubun.dev/api/v8/ping

# FRONT-END
- Sass
- Bootstrap
- Angularjs


# Reference
- Ubuntu https://wiki.ubuntu.com/Releases
- MySQL https://dev.mysql.com/doc/relnotes/mysql/5.7/en/
- PHP https://secure.php.net/releases/
- Node https://github.com/nodesource/distributions
