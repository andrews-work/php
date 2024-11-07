{
    "name": "base2",
    "version": "1.0.0",
    "main": "index.js",
    "scripts": {
      "dev": "NODE_ENV=dev node src/scripts/build.js",
      "uat": "NODE_ENV=uat node src/scripts/build.js",
      "prod": "NODE_ENV=prod node src/scripts/build.js"
    },
    "keywords": [],
    "author": "",
    "license": "ISC",
    "description": "",
    "devDependencies": {
      "browser-sync": "^3.0.3"

    },
    "dependencies": {
      "dotenv": "^16.4.5",
      "tailwindcss": "^3.4.13"
    }
  }
  