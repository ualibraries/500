# University of Arizona Libraries - Reformation 500 Omeka Exhibit Theme

[![Build Status](https://travis-ci.org/ualibraries/500.svg?branch=master)](https://travis-ci.org/ualibraries/500)
[![JavaScript Style Guide](https://img.shields.io/badge/code_style-standard-brightgreen.svg)](https://standardjs.com)
[![Dependencies](https://david-dm.org/ualibraries/500.svg)](https://david-dm.org/ualibraries/500)

![Screenshot](screenshot.png)

## Getting started

Install the dependencies: `npm install`

## Scripts

You can build the project with [Webpack](https://webpack.github.io/) by running
`npm run build:prod` (builds for production) or `npm run build:dev` (builds for development).

This project uses [JavaScript Standard Style](https://standardjs.com/).
Test it by running `npm test`. Lint it by running `npm run lint`.

## Live reloading

We're using [Browsersync](https://browsersync.io/) for live reloading. Create
a file named `.env` in the theme root, and add one line of configuration describing
the port number for your local development environment.

Example contents:

```
PORT=8888
```

Browsersync uses port 3000 to proxy the existing content. Visit `localhost:3000/path/to/your/site`
to see the fancy live reloading. Visit `localhost:3001` to see the Browsersync UI.

## Fancy headers

You can make a fancy header with the `fancy-header class`:

```
<h2 class="fancy-header">Featured items</h2>
```

## Learn more

* [PostCSS](http://postcss.org/) and [CSSNext](http://cssnext.io/)
* [Babel](https://babeljs.io/)
* [Webpack](https://webpack.js.org/)
* [JavaScript Standard Style](https://standardjs.com/)
* [Travis CI](https://travis-ci.org/)
