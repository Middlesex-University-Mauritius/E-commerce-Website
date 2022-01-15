# Coursework 2: E-commerce Website

## Summary
- Group project
- Weighting: 30%
- Deadline for first submission: 16:00 Friday 21st January 2022 (end of Week 14)
- Deadline for final submission: 16:00 Friday 18th February 2022 (end of Week 18)
- Demonstration deadline: 18:00 Friday 4th March 2022 (end of Week 20)


## Description
An online booking system for events. CRM, Checkout, Listings and seat reservation.


## Structure
| Codebase              |   Description                  |
| :-------------------- | :----------------------------: |
| [Research](research)  | Research, Prototyping, Testing |


## Contributing

### Git commit conventions
- feat: The new feature you're adding to a particular application
- research: Research files
- fix: A bug fix
- style: Feature and updates related to styling
- refactor: Refactoring a specific section of the codebase
- test: Everything related to testing
- docs: Everything related to documentation
- chore: Regular code maintenance.[ You can also use emojis to represent commit types]

## Installations

**starting web**
right click on ```web``` and create a shortcut. drag the shortcut to htdocs. You will then be able access the website using ```localhost:8080/web```

**sass**
To use sass you need node js and npm installed. Follow this [tutorial](https://phoenixnap.com/kb/install-node-js-npm-on-windows).

**install sass**
```
npm install -g sass
```

**compile sass into css**
```
sass --watch sass/index.scss styles.scss
```

**show errors in php**
add ```display_errors = on``` in ```/opt/lampp/etc/php.ini```

## Mongod
```
mongod --port 27018
sudo killall mongod
```

## PHP Mongodb Driver
```
sudo apt-get install php-dev
sudo apt-get install php-pear
sudo pecl install mongodb
```
